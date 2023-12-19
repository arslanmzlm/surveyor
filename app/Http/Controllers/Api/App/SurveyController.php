<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Survey;
use App\Repository\TemplateRepository;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $surveys = new Filter(Survey::class);

        return response($surveys->withOnly(['group', 'template'])->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        $templates = new Filter(Survey::class);

        return response($templates->userOnly()->getData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTemplateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplateRequest $request): \Illuminate\Http\Response
    {
        $template = TemplateRepository::store();

        return response($template);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Survey $template
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $template): \Illuminate\Http\Response
    {
        return response($template);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTemplateRequest $request
     * @param \App\Models\Survey $template
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateRequest $request, Survey $template): \Illuminate\Http\Response
    {
        $template = TemplateRepository::update($template);

        return response($template);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Survey $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $template): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$template->delete()]);
    }
}
