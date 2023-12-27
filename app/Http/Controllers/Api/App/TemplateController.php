<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use App\Repository\TemplateRepository;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $templates = new Filter(Template::class);

        return response($templates->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(): \Illuminate\Http\Response
    {
        $templates = new Filter(Template::class);

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
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template): \Illuminate\Http\Response
    {
        return response($template);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTemplateRequest $request
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateRequest $request, Template $template): \Illuminate\Http\Response
    {
        $template = TemplateRepository::update($template);

        return response($template);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template): \Illuminate\Http\Response
    {
        return response(['success' => (bool)$template->delete()]);
    }
}
