<?php

namespace App\Models\Report\Traits\Attribute;

/**
 * Trait ReportAttribute.
 */
trait ReportAttribute
{

     /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.report.report.show', $this).'" class="btn btn-info"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.report.report.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.report.report.destroy', $this).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        
        return '<div class="btn-group btn-group-sm" report="group" aria-label="Report Actions">
                 '.$this->show_button.'
                '.$this->edit_button.'
              '.$this->delete_button.'
			</div>';
    }
}
