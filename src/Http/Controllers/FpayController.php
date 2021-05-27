<?php

namespace Fgmarins\Fpay\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Modules\Fpay\Services\FpayService\Api;

/**
 * Class FpayController
 * @package Fgmarins\Fpay\Http\Controllers
 */
class FpayController
{
    /**
     * @var Api
     */
    private $fpayService;

    /**
     * TesteController constructor.
     * @param Api $fpayService
     */
    public function __construct(Api $fpayService)
    {
        $this->fpayService = $fpayService;
        $this->fpayService->setClientCode(env("CLIENT_CODE"));
        $this->fpayService->setClientKey(env("CLIENT_KEY"));
    }

    /**
     * @param $request
     * @return array
     * @throws ValidationException
     */
    private function validate($request): array
    {
        $rules = [
            "nu_referencia" => "nullable|max:20",
            "nu_venda"      => "nullable|max:20",
            "page"          => "nullable|numeric",
            "per_page"      => "nullable|numeric",
            "dt_venda"      => "nullable|date",
        ];

        $messages = [
            "nu_referencia.max" => "O campo nu_referencia deve conter no máximo 20 caracteres.",
            "nu_venda.max"      => "O campo nu_venda deve conter no máximo 20 caracteres.",
            "page.numeric"      => "O campo page deve conter apenas números.",
            "per_page.numeric"  => "O campo per_page deve conter apenas números.",
            "dt_venda.date"     => "O campo dt_venda deve conter uma data.",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if (!$validator->fails()) {
            return $validator->validated();
        }

        $messages = $validator->messages();
        $errors   = $messages->all();

        throw new ValidationException($validator, null, $errors);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSales(Request $request): JsonResponse
    {
        try {
            $params = $this->validate($request);
            $result = $this->fpayService->getSale($params);

            return $this->successJson($result);
        } catch (Exception $ex) {
            return $this->errorJson($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSalesNameAndDocument(Request $request): JsonResponse
    {
        try {
            $params    = $this->validate($request);
            $resultApi = $this->fpayService->getSale($params);
            $result    = $this->fpayService->getNameAndDocument($resultApi);

            return $this->successJson($result);
        } catch (Exception $ex) {
            return $this->errorJson($ex);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAllSalesInstallments(Request $request): JsonResponse
    {
        try {
            $params    = $this->validate($request);
            $resultApi = $this->fpayService->getSale($params);
            $result    = $this->fpayService->getAllInstallments($resultApi);

            return $this->successJson($result);
        } catch (Exception $ex) {
            return $this->errorJson($ex);
        }
    }

    /**
     * @param array $result
     * @return JsonResponse
     */
    private function successJson(array $result): JsonResponse
    {
        return response()->json(
            [
                "message" => "Sucesso!",
                "result"  => $result,
            ]
        );
    }

    /**
     * @param Exception $ex
     * @return JsonResponse
     */
    private function errorJson(Exception $ex): JsonResponse
    {
        Log::error($ex->getMessage());
        $message = "Ocorreu um erro inesperado, tente novamente mais tarde!";
        if ($ex instanceof ValidationException) {
            $message  = $ex->getMessage();
            $errorBag = $ex->errorBag;
        }

        return response()->json(
            array_filter(
                [
                    "message" => $message,
                    "errors"  => $errorBag ?? null,
                ]
            ), 400
        );
    }
}
