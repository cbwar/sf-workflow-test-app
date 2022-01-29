<?php

namespace App\EventListener;

use App\Entity\Document;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class DocumentPersistNotifier
{
    public function postPersist(Document $document, LifecycleEventArgs $event): void
    {
        $document->setPath('var/documents/doc_' . $document->getId());
        $event->getObjectManager()->flush();
    }
}
