@extends('frontend.layouts.master')

@section('content')
  <div class="row">

    <div class="col-md-10 col-md-offset-1">

      <div class="panel panel-default">
        <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

        <div class="panel-body">
          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.my_information') }}</a>
              </li>
              <li role="presentation">
                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.settings') }}</a>
              </li>
            </ul>

            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="profile">
                <table class="table table-striped table-hover table-bordered dashboard-table">
                  <tr>
                    <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
                    <td><img src="{!! $user->picture !!}" class="user-profile-image"/></td>
                  </tr>
                  <tr>
                    <th>{{ trans('labels.frontend.user.profile.name') }}</th>
                    <td>{!! $user->name !!}</td>
                  </tr>
                  <tr>
                    <th>{{ trans('labels.frontend.user.profile.email') }}</th>
                    <td>{!! $user->email !!}</td>
                  </tr>
                  <tr>
                    <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
                    <td>{!! $user->created_at !!} ({!! $user->created_at->diffForHumans() !!})</td>
                  </tr>
                  <tr>
                    <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                    <td>{!! $user->updated_at !!} ({!! $user->updated_at->diffForHumans() !!})</td>
                  </tr>
                  <tr>
                    <th>{{ trans('labels.general.actions') }}</th>
                    <td>
                      <a href="{!! route('frontend.user.profile.edit') !!}" class="btn btn-primary btn-xs">{{ trans('labels.frontend.user.profile.edit_information') }}</a>

                      @if ($user->canChangePassword())
                        <a href="{!! route('auth.password.change') !!}" class="btn btn-warning btn-xs">{{ trans('navs.frontend.user.change_password') }}</a>
                      @endif
                    </td>
                  </tr>
                </table>
              </div><!--tab panel profile-->
              <div role="tabpanel" class="tab-pane" id="settings">

                <div class="panel-body">

                  {!! Form::model($settings, ['route' => 'frontend.user.profile.settings.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                  <div class="form-group">
                    {!! Form::label('invoice_number', 'Rechnungsnummer:', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                      {!! Form::input('text', 'invoice_number', $settings->invoice_number, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) !!}
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      {!! Form::submit(trans('labels.general.buttons.save'), ['class' => 'btn btn-primary']) !!}
                    </div>
                  </div>

                  {!! Form::close() !!}

                </div><!--panel body-->

              </div><!-- panel -->

            </div>

            </div><!--tab content-->

          </div><!--tab panel-->

        </div><!--panel body-->

      </div><!-- panel -->

    </div><!-- col-md-10 -->

  </div><!-- row -->
@endsection