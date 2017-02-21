<?php
namespace AdminBundle\Controller;

use RoBundle\Entity\Event;
use RoBundle\Entity\Poster;
use RoBundle\Form\Type\UploadFileType;
use RoBundle\Service\EventService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/** @Route("/event/{eventId}/poster", service="admin.controller.posters_controller") */
class AdminPostersController extends AbstractAdminController
{
    /** @var UploadableManager */
    private $uploadableManager;

    /** @var EventService */
    private $eventService;

    /**
     * @param UploadableManager $uploadableManager
     */
    public function __construct(UploadableManager $uploadableManager, EventService $eventService)
    {
        $this->uploadableManager = $uploadableManager;
        $this->eventService = $eventService;
    }

    /**
     * @Route("/show", name="admin_posters_show")
     * @Template
     * @ParamConverter("event", options={"id" = "eventId"})
     */
    public function showAction(Request $request, Event $event)
    {
        $poster = $event->getPoster();

        if (!$poster) {
            $poster = new Poster();
        }

        $form = $this->createForm(UploadFileType::class, $poster, ['data_class' => Poster::class]);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            if ($poster->getFile() instanceof UploadedFile) {
                $this->uploadableManager->markEntityToUpload(
                    $poster,
                    $poster->getFile()
                );

                $event->setPoster($poster);

                $this->eventService->saveEvent($event);
            }
        }

        return [
            'event' => $event,
            'form' => $form->createView()
        ];
    }
}
