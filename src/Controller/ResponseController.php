<?php

namespace Bg\GenerateFormBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Fields;
use App\Entity\Form;
use App\Entity\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseController extends AbstractController
{
    /**
     * @Route(path="form/submit")
     */
    public function SubmitResponseAction(Request $request)
    {
        $json = json_decode($request->getContent(false), true);

        $em = $this->getDoctrine()->getManager();
        $form_id = $json['form_id'];
        $today = date("j F, Y");
        $responses = json_encode($json['content'], JSON_UNESCAPED_UNICODE);
        $form = $this->getDoctrine()
            ->getRepository(Form::class)
            ->find($form_id);

        if (!$form) {
            return new JsonResponse('please check your form');
        }

        $response = new Response($form,$responses);
       $response->setDateResp($today);
       $em->persist($response);
        $em->flush();
       return new JsonResponse('form submitted');

    }

    /**
     * @Route(path="api/GetResponse")
     */
    public function ListAllAction(){
        $response = $this->getDoctrine()
            ->getRepository(Response::class)
            ->findAll();

        $responseArray = array();
        foreach ($response as $content){
            $rep=json_decode($content-> getContent(), JSON_UNESCAPED_UNICODE);
            $titleform= $content-> getForm()->getTitle();
            $ResponseData = array(
                'id' => $content -> getId(),
                'content' => $rep,
                'titleform' => $titleform,
                'date'=> $content->getDateResp(),
                'form_id' => $content-> getForm()->getId());
            array_push($responseArray, $ResponseData);
        }

        return new JsonResponse($responseArray);
    }



}
