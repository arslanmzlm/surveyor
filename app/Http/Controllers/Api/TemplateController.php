<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Filter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Models\Template;
use App\Repository\TemplateRepository;
use Illuminate\Http\Response;

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

        return response($templates->userOnly()->get());
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
        $template = TemplateRepository::storeTemplate();

        return response(Template::find($template->id));
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
     * @param \App\Http\Requests\StoreTemplateRequest $request
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTemplateRequest $request, Template $template): \Illuminate\Http\Response
    {
        $template = TemplateRepository::updateTemplate($template);

        return response(Template::find($template->id));
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
