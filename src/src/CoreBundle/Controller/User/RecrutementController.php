<?php
namespace CoreBundle\Controller\User;

use CoreBundle\Entity\Admin\Candidat;
use CoreBundle\Form\Admin\CandidatType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class RecrutementController
 * @package CoreBundle\Controller\User
 */
class RecrutementController extends Controller
{
    /**
     * @param $candidatEdit
     * @Route(path="/user/ajax/candidat/get/{candidatEdit}",name="user_ajax_get_candidat")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function candidatGetInfosIndex($candidatEdit)
    {
        return new JsonResponse($this->get('core.candidat_manager')->createArray($candidatEdit));
    }

    /**
     * @param $isTransformed
     * @param $userInfos
     * @return array
     */
    private function generateItemsList($isTransformed, $userInfos)
    {
        $myProfil = $this->get('core.utilisateur_manager')->load($this->get('ad.active_directory_user_link_manager')->getRepository()->findOneByIdentifiant($userInfos->getUsername())->getUser());
        $allItems = $this->get('core.candidat_manager')->getRepository()->findBy(array('isArchived' => $isTransformed, 'responsable' => $myProfil->getId()), array('startDate' => 'DESC'));
        foreach ($allItems as $item) {
            $this->get('core.index.controller_service')->ifFilterConvertService($item, 'Candidat');
            $this->get('core.index.controller_service')->ifFilterConvertFonction($item, 'Candidat');
            $this->get('core.index.controller_service')->ifFilterConvertAgence($item, 'Candidat');
        }
        return $allItems;
    }

    /**
     * @param $isTransformed
     * @Route(path="/user/recrutement/show/{isTransformed}", name="user_recrutement_show")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($isTransformed)
    {
        $session_messaging = $this->get('session')->get('messaging');
        $this->get('session')->set('messaging', []);
        $globalAlertColor = $this->get('core.index.controller_service')->getGlobalAlertColor($session_messaging);
        $candidatListe = $this->get('core.candidat_manager')->getRepository()->findBy(array('isArchived' => '0'), array('startDate' => 'ASC'));
        $userInfos = $this->get('security.token_storage')->getToken()->getUser();
        $myProfil = $this->get('core.utilisateur_manager')->load($this->get('ad.active_directory_user_link_manager')->getRepository()->findOneByIdentifiant($userInfos->getUsername())->getUser());

        return $this->render('@Core/User/Recrutement/view.html.twig', array(
            'manager'                  => $this->get('core.manager_service_link_manager')->isManager($myProfil->getId()),
            'formView'                 => $this->createForm(CandidatType::class, new Candidat(), array('allow_extra_fields' => $this->get('core.index.controller_service')->generateListeChoices()))->createView(),
            'panel'                    => 'user', 'all' => $this->generateItemsList($isTransformed, $userInfos), 'is_archived' => 0, 'session_messaging' => $session_messaging, 'globalAlertColor' => $globalAlertColor,
            'entity'                   => strtolower($this->get('core.index.controller_service')->checkFormEntity('Candidat')),
            'nb_candidat'              => count($candidatListe),
            'candidat_color'           => $this->get('core.index.controller_service')->colorForCandidatSlider($candidatListe[0]->getStartDate()->format("Y-m-d")),
            'currentUserInfos'         => $this->get('security.token_storage')->getToken()->getUser(),
            'userPhoto'                => $this->get('google.google_user_api_service')->base64safeToBase64(stream_get_contents($this->get('security.token_storage')->getToken()->getUser()->getPhoto())),
            'remaining_gmail_licenses' => $this->get('app.parameters_calls')->getParam('remaining_google_licenses'), 'remaining_salesforce_licenses' => $this->get('app.parameters_calls')->getParam('remaining_licences_type_Salesforce'),
        ));
    }
}