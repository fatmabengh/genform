<?php
/**
 * Created by PhpStorm.
 * User: bghanem
 * Date: 01/04/2019
 * Time: 18:07
 */

namespace Bg\GenerateFormBundle\Controller;
use App\Entity\Fields;
use App\Entity\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FieldsController extends AbstractController
{
    /**
     * @Route("/field")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $json = json_decode($request->getContent(false), true);
        $label = $json["label"];
        $subtitle = $json["subtitle"];
        $types = $json["types"];
        $items= $json["items"];
        $form_id = $json["form_id"];
        $fields=new Fields($label, $subtitle,$types);
        $fields->setItems($items);
        $form = $em->find(Form::class, $form_id);
        $fields->setForm($form);
        $em->persist($fields);
        $em->flush();
        return new JsonResponse('new fields added');
    }
}
