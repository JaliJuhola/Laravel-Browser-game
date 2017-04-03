@extends('layouts.app')
@section('content')
    <style>
        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }

        .table-user-information > tbody > tr > td {
            border-top: 0;
        }

        .toppad {
            margin-top: 20px;
        }

    </style>
    <script type="text/javascript">
        window.alert = function () {
        };
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css) {
            if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $(document).ready(function () {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage(iframe_height, 'http://bootsnipp.com');
        });
    </script>
    <div class="container" style="width: 96%; ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="text-align: center">Profile page </h1>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$user->name}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                                    src="http://lorempixel.com/g/96/105/"
                                                                                    class="img-circle img-responsive">
                                </div>

                                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                                  <dl>
                                    <dt>DEPARTMENT:</dt>
                                    <dd>Administrator</dd>
                                    <dt>HIRE DATE</dt>
                                    <dd>11/12/2013</dd>
                                    <dt>DATE OF BIRTH</dt>
                                       <dd>11/12/2013</dd>
                                    <dt>GENDER</dt>
                                    <dd>Male</dd>
                                  </dl>
                                </div>-->
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>User since:</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Description:</td>
                                            @if(!empty($user->description))
                                                <td><textarea name="user_description"
                                                              form="update_user">{{$user->description}}</textarea></td>
                                            @else
                                                <td><textarea name="user_description" form="update_user"
                                                              placeholder="not implemented yet!"></textarea></td>
                                            @endif
                                        </tr>

                                        </tbody>
                                    </table>

                                    <form id="update_user" action="{{route('profile/update')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="submit" name="Update" value="Update profile" class="btn btn-primary">
                                    </form>
                                    <form id="deleteUser" action="{{route("user/delete")}}" method="post">
                                        {{csrf_field()}}
                                        <input type="submit" name="Delete" value="Delete your account!" class="btn btn-default">
                                    </form>
                                    @if (count($errors) > 0)
                                      <div class="alert alert-danger">
                                       <ul>
                                      @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                    @endforeach
                                     </ul>
                                     </div>
                               @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                            <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var panels = $('.user-infos');
            var panelsButton = $('.dropdown-user');
            panels.hide();

            //Click dropdown
            panelsButton.click(function () {
                //get data-for attribute
                var dataFor = $(this).attr('data-for');
                var idFor = $(dataFor);

                //current button
                var currentButton = $(this);
                idFor.slideToggle(400, function () {
                    //Completed slidetoggle
                    if (idFor.is(':visible')) {
                        currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
                    }
                    else {
                        currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
                    }
                })
            });


            $('[data-toggle="tooltip"]').tooltip();

            $('button').click(function (e) {
                e.preventDefault();
                alert("This is a demo.\n :-)");
            });
        });
    </script>

@endsection