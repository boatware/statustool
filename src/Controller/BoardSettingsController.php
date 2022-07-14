<?php

namespace App\Controller;

use App\Entity\BoardSettings;
use App\Form\BoardSettingsType;
use App\Repository\BoardSettingsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted("ROLE_ADMIN")]
#[Route('/board/settings')]
class BoardSettingsController extends AbstractController
{
    #[Route('/', name: 'app_board_settings_index', methods: ['GET'])]
    public function index(BoardSettingsRepository $boardSettingsRepository): Response
    {
        return $this->render('board_settings/index.html.twig', [
            'board_settings' => $boardSettingsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_board_settings_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BoardSettingsRepository $boardSettingsRepository): Response
    {
        $boardSetting = new BoardSettings();
        $form = $this->createForm(BoardSettingsType::class, $boardSetting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boardSettingsRepository->add($boardSetting, true);

            return $this->redirectToRoute('app_board_settings_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('board_settings/new.html.twig', [
            'board_setting' => $boardSetting,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_board_settings_show', methods: ['GET'])]
    public function show(BoardSettings $boardSetting): Response
    {
        return $this->render('board_settings/show.html.twig', [
            'board_setting' => $boardSetting,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_board_settings_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BoardSettings $boardSetting, BoardSettingsRepository $boardSettingsRepository): Response
    {
        $form = $this->createForm(BoardSettingsType::class, $boardSetting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boardSettingsRepository->add($boardSetting, true);

            return $this->redirectToRoute('app_board_settings_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('board_settings/edit.html.twig', [
            'board_setting' => $boardSetting,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_board_settings_delete', methods: ['POST'])]
    public function delete(Request $request, BoardSettings $boardSetting, BoardSettingsRepository $boardSettingsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boardSetting->getId(), $request->request->get('_token'))) {
            $boardSettingsRepository->remove($boardSetting, true);
        }

        return $this->redirectToRoute('app_board_settings_index', [], Response::HTTP_SEE_OTHER);
    }
}
