<?php


class PaginationController extends AbstractController {

    public function index(): void
    {
        $pag = $this->getModel('pagination');

        $pag->getData();
        $page = $pag->getPaginationNumber();

      $this->render('pagination', ['page' => $page]);

    }


}