<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/document')]
class DocumentController extends AbstractController
{
    #[Route('/', name: 'document_index')]
    public function index(DocumentRepository $documentRepository): Response
    {
        $documents = $documentRepository->findAll();
        return $this->render('document/index.html.twig', [
            'documents' => $documents
        ]);
    }

    #[Route('/{id}', name: 'document_view', requirements: ['id' => '\d+'])]
    public function view(int $id, DocumentRepository $documentRepository): Response
    {
        if (($document = $documentRepository->find($id)) === null) {
            throw new NotFoundHttpException('document not found');
        }
        return $this->render('document/view.html.twig', [
            'document' => $document
        ]);
    }
}
