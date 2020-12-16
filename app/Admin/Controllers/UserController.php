<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->disableRowSelector(false);
            $grid->model()->orderBy('id','desc');

            $grid->column('id')->sortable();

            $grid->column('portrait')->image();
            $grid->column('username');
            $grid->column('nickname');
            $grid->column('password')->hide();
            $grid->column('salt')->hide();
            $grid->column('phone');
            $grid->column('email');
            $grid->column('is_lock')->switch();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->showColumnSelector();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('id');
                $filter->like('nickname');
                $filter->like('email');
                $filter->like('phone');
                $filter->equal('is_lock')
                    ->select([0=>'未锁定',1=>'已锁定']);
                $filter->between('created_at')
                    ->datetime()->toTimestamp();
                $filter->between('updated_at')
                    ->datetime()->toTimestamp();
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('username');
            $show->field('nickname');
            $show->field('password');
            $show->field('salt');
            $show->field('phone');
            $show->field('email');
            $show->field('is_lock');
            $show->field('portrait');
            $show->field('created_at');
            $show->field('updated_at');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('username');
            $form->text('nickname');
            $form->text('password');
            $form->text('salt');
            $form->text('phone');
            $form->text('email');
            $form->text('is_lock');
            $form->text('portrait');
            $form->text('created_at');
            $form->text('updated_at');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
