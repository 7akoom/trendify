<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Traits\WebResponse;
use App\Services\Backend\SettingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateSettingRequest;

class SettingController extends Controller
{
    use WebResponse;

    public function __construct(private SettingService $service) {}

    public function index()
    {
        $setting = $this->service->all();
        return view('admin.settings.index', compact('setting'));
    }


    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $this->service->create($request->validated());
        return $this->redirectWithMessage('admin.settings.index', 'Setting created successfully.');
    }

    public function show(Setting $setting)
    {
        return view('admin.settings.show', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $this->service->update($setting, $request->validated());
        return $this->redirectWithMessage('admin.settings.index', 'Setting updated.');
    }

    public function destroy(Setting $setting)
    {
        $this->service->delete($setting);
        return $this->redirectWithMessage('admin.settings.index', 'Setting deleted.');
    }
}
