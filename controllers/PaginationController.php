<?php


class PaginationController extends AbstractController {

    public function index(): void
    {
        $pag = $this->getModel('pagination');

        $pag->pagination();

      $this->render('pagination');

    }


}