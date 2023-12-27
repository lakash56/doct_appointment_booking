<!-- Modal -->
@if (count($bookings)>0)


<div class="modal fade" id="exampleModal{{$booking->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Write Prescriptoin</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <form action="{{route('prescription')}}" method="post">@csrf
                             <div class="modal-body" id="app">

                                 <input type="text" name="user_id" value="{{$booking->user->id}}">
                                 {{-- <input type="text" name="name" value="{{$booking->user->name}}"> --}}
                                 <input type="text" name="doctor_id" value="{{$booking->doctor_id}}">
                                 <input type="text" name="date" value="{{$booking->date}}">

                                 <div class="form-group">
                                     <label for="">Disease</label>
                                     <input type="text" name="name_of_disease" class="form-control" required="">
                                     </div>
                                 <div class="form-group">
                                     <label for="">Symptoms</label>

                                     <textarea name="symptoms" class="form-control" placeholder="Symptoms" required=""></textarea>
                                 </div>
                                 <div class="form-group" >
                                     <label>Medicine</label>
                                     <add-btn></add-btn>
                                 </div>
                                 <div class="form-group">
                                     <label for="">How to use</label>
                                     <textarea name="process_to_use_medicine" class="form-control" placeholder="How to use" required=""></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Feedbacks</label>

                                     <textarea name="feedback" class="form-control" placeholder="Doctor's Feedback" required=""></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Signature</label>
                                     <input type="text" name="signature" class="form-control" required="">
                                 </div>

                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Save changes</button>
                             </div>
                            </form>
                           </div>
                         </div>
                       </div>
                       @endif
