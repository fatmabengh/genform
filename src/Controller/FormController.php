<?php
/**
 * Created by PhpStorm.
 * User: bghanem
 * Date: 01/04/2019
 * Time: 18:09
 */

namespace Bg\GenerateFormBundle\Controller;

use App\Entity\Fields;
use App\Entity\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DateTime;

class FormController extends AbstractController
{

    /**
     * @Route("apitest/form",methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $dateModif = new \DateTime();
        $form = new Form($json["title"],$json["description"],$dateModif);
        $fields = $json['fields'];
        foreach ($fields as $field) {
            $quest = new Fields($field['label'], $field['subtitle'], $field['types']);
            $quest->setForm($form);
            $quest->setItems($field['items']);

            $em->persist($quest);
            $em->flush();
        }
        $em->persist($form);
        $em->flush();
        return new JsonResponse($form->getId());
    }



}
