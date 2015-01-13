<?php

namespace LoversLock\CadenasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use LoversLock\CadenasBundle\Entity\Cadenas;
use LoversLock\CadenasBundle\Form\CadenasType;

/**
 * Cadenas controller.
 *
 * @Route("/cadenas")
 */
class CadenasController extends Controller
{

    /**
     * Lists all Cadenas entities.
     *
     * @Route("/", name="cadenas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LoversLockCadenasBundle:Cadenas')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cadenas entity.
     *
     * @Route("/", name="cadenas_create")
     * @Method("POST")
     * @Template("LoversLockCadenasBundle:Cadenas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cadenas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cadenas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Cadenas entity.
     *
     * @param Cadenas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cadenas $entity)
    {
        $form = $this->createForm(new CadenasType(), $entity, array(
            'action' => $this->generateUrl('cadenas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cadenas entity.
     *
     * @Route("/new", name="cadenas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cadenas();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cadenas entity.
     *
     * @Route("/{id}", name="cadenas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoversLockCadenasBundle:Cadenas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cadenas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cadenas entity.
     *
     * @Route("/{id}/edit", name="cadenas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoversLockCadenasBundle:Cadenas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cadenas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Cadenas entity.
    *
    * @param Cadenas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cadenas $entity)
    {
        $form = $this->createForm(new CadenasType(), $entity, array(
            'action' => $this->generateUrl('cadenas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cadenas entity.
     *
     * @Route("/{id}", name="cadenas_update")
     * @Method("PUT")
     * @Template("LoversLockCadenasBundle:Cadenas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LoversLockCadenasBundle:Cadenas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cadenas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cadenas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cadenas entity.
     *
     * @Route("/{id}", name="cadenas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LoversLockCadenasBundle:Cadenas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cadenas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cadenas'));
    }

    /**
     * Creates a form to delete a Cadenas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadenas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
