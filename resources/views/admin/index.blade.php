<x-admin-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>
    <x-slot name="title">
        {{ __('Admin - Dashboard') }}
    </x-slot>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$unread_msg}}</h3>

                    <p>New Inquiry</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.contacts.index',"table[sorts][is_seen]=asc") }}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

         <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$not_replied_msg}}</h3>

                    <p>Inquiry not replied</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.contacts.index',"table[sorts][is_replied]=asc") }}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$notices}}</h3>

                    <p>Active Notices</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.notices.index') }}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

         <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$alumni}}</h3>

                    <p>Notable Alumins</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.alumins.index') }}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">How to manage this website</h3>

                <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-3" style="display: block;">
                <p>After I complete making this content management section, I will add a video here explaining how to run this site.</p>

              </div>
              <!-- /.card-body -->

            </div>
        </div>
    </div>
</x-admin-layout>
