<?php

namespace Jblv\Admin\Scheduling;

use Illuminate\Http\Request;
use Jblv\Admin\Facades\Admin;
use Jblv\Admin\Layout\Content;

class SchedulingController
{
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('Task scheduling');

            $scheduling = new Scheduling();

            $content->body(view('daimakuai-ext-scheduling::index', [
                'events' => $scheduling->getTasks(),
            ]));
        });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function runEvent(Request $request)
    {
        $scheduling = new Scheduling();

        try {
            $output = $scheduling->runTask($request->get('id'));

            return [
                'status'    => true,
                'message'   => 'success',
                'data'      => $output,
            ];
        } catch (\Exception $e) {
            return [
                'status'    => false,
                'message'   => 'failed',
                'data'      => $e->getMessage(),
            ];
        }
    }
}
