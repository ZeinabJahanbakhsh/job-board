@extends('layouts.app')

@section('title', 'The official job board')

@section('content_header')
    <h1>Job board</h1>
@endsection

@section('adminlte_css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Online Advertising Jobs</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>tags</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employers as $employer)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $employer->company_name }}</td>
                                <td>{{ $employer->title}}</td>
                                <td> {{ Str::limit($employer->description, 100) }} </td>
                                <td>
                                    <span class="label label-success">
                                <a class="btn bg-indigo btn-sm" href="#" role="button">Laravel</a>
                                <button class="btn bg-indigo btn-sm" style="margin: 2px" type="submit">php</button>
                                <button class="btn bg-indigo btn-sm" style="margin: 2px" type="submit">nodeJs</button>
                                <button class="btn bg-indigo btn-sm " style="margin: 2px" type="submit">MySql</button>
                            </span>
                                </td>
                                <td>
                                    <a href="{{ route('show-job', $employer->id) }}" type="button" class="btn-sm bg-green">View</a>

                                </td>
                            </tr>
                            <tr class="expandable-body d-none">
                                <td colspan="5">
                                    <p style="display: none;">
                                        {{ $employer->description }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach

                        {{--  <tr data-widget="expandable-table" aria-expanded="true">
                              <td>219</td>
                              <td>Alexander Pierce</td>
                              <td>11-7-2014</td>
                              <td>Pending</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>

                          </tr>
                          <tr class="expandable-body">
                              <td colspan="5">
                                  <p>
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="true">
                              <td>657</td>
                              <td>Alexander Pierce</td>
                              <td>11-7-2014</td>
                              <td>Approved</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr class="expandable-body">
                              <td colspan="5">
                                  <p>
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                              <td>175</td>
                              <td>Mike Doe</td>
                              <td>11-7-2014</td>
                              <td>Denied</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr class="expandable-body d-none">
                              <td colspan="5">
                                  <p style="display: none;">
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                              <td>134</td>
                              <td>Jim Doe</td>
                              <td>11-7-2014</td>
                              <td>Approved</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr class="expandable-body d-none">
                              <td colspan="5">
                                  <p style="display: none;">
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                              <td>494</td>
                              <td>Victoria Doe</td>
                              <td>11-7-2014</td>
                              <td>Pending</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr class="expandable-body d-none">
                              <td colspan="5">
                                  <p style="display: none;">
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                              <td>832</td>
                              <td>Michael Doe</td>
                              <td>11-7-2014</td>
                              <td>Approved</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr class="expandable-body d-none">
                              <td colspan="5">
                                  <p style="display: none;">
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                              <td>982</td>
                              <td>Rocky Doe</td>
                              <td>11-7-2014</td>
                              <td>Denied</td>
                              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                          </tr>
                          <tr class="expandable-body d-none">
                              <td colspan="5">
                                  <p style="display: none;">
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                  </p>
                              </td>
                          </tr>--}}

                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $employers->links() }}
                </div>

            </div>
        </div>
    </div>

@stop
