@extends('admin.layouts.calendar')
@section('content')
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="white-box">
                  <div id="calendar"></div>
                  </div>
              </div>
          </div>

          <!-- BEGIN MODAL -->
            <div class="modal fade none-border" id="my-event">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add Event</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add Category -->
            <div class="modal fade none-border" id="add-new-event">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add</strong> a category</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Category Name</label>
                                        <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label class="control-label">Choose Category Color</label>
                                        <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                            <option value="success">Success</option>
                                            <option value="danger">Danger</option>
                                            <option value="info">Info</option>
                                            <option value="primary">Primary</option>
                                            <option value="warning">Warning</option>
                                            <option value="inverse">Inverse</option>
                                        </select>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->

      </div>
  </section>
@stop