<?php

namespace App\Controller;

use App\Entity\Hero;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeroController extends AbstractController
{
    /**
     * @Route("/api/heroes/create/{name}", name="hero_create", methods={"POST"})
     */
    public function createHero(string $name): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $hero = new Hero();
        $hero->setName($name);

        $entityManager->persist($hero);
        $entityManager->flush();

        return $this->json($hero);
    }

    /**
     * @Route("/api/heroes", name="heroes_get", methods={"GET"})
     */
    public function getAllHeroes(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $heroes = $entityManager->getRepository(Hero::class)->findAll();

        return $this->json($heroes);
    }

    /**
     * @Route("/api/heroes/{id}", name="hero_get", methods={"GET"})
     */
    public function getHeroById(Hero $hero): Response
    {
        return $this->json($hero);
    }

    /**
     * @Route("/api/heroes/update/{id}/{newName}", name="hero_update")
     */
    public function updateHero(int $id, string $newName): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $hero = $entityManager->getRepository(Hero::class)->find($id);

        $hero->setName($newName);
        $entityManager->flush();

        return $this->json($hero);
    }

    /**
     * @Route("/api/heroes/delete/{id}", name="hero_delete", methods={"DELETE"})
     */
    public function deleteHeroById(Hero $hero): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($hero);
        $entityManager->flush();

        return $this->json([
            "message" => "Successfully removed hero!"
        ]);
    }
}
