<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CustomerAccount;

class CustomerController extends AbstractController
{
    /**
     * @Route("/add-account", name="add_account", methods={"GET"})
     */
    public function add_account(Request $request): JsonResponse
    {
		$alpha   = str_shuffle('1234567890');

		// Create a string of all numeric characters and randomly shuffle them
		$numeric = str_shuffle('0123456789');

		// Grab the 4 first alpha characters + the 2 first numeric characters
		$code = substr($alpha, 0, 4) . substr($numeric, 0, 6);

		// Shuffle the code to get the alpha and numeric in random positions
		$code = str_shuffle($code);
		
        $customerAccount = new CustomerAccount();
		$customerAccount->setAccountNumber($code);
		$customerAccount->setFirstName($request->get('first_name'));
		$customerAccount->setLastName($request->get('last_name'));
		$customerAccount->setPhone($request->get('phone'));
		$customerAccount->setStatus('active');
			
		$em = $this->getDoctrine()->getManager();
		$em->persist($customerAccount);
		$em->flush();
		
		return new JsonResponse(['status' => 'Customer Account created!'], Response::HTTP_CREATED);
    }
}