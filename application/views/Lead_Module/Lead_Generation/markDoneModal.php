<style>
.star-rating i {
    font-size: 18px;
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
}

.star-rating i.active {
    color: #fbc02d;
}

.star-rating i:hover {
    color: #ffeb3b;
}
</style>

<div class="modal fade" id="markDoneModal" tabindex="-1" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark Done</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Dynamic form load hoga -->
                <form id="markDoneForm" method="post">
                    <input type="hidden" name="lead_id" id="mark_done_lead_id">
                    <input type="hidden" name="act_id" id="mark_done_act_id">
                    <input type="hidden" name="activity_rating" id="activity_rating">

                    <div class="mb-3 text-center">
                        <label class="form-label d-block mb-2">Rate Activity</label>
                        <div class="star-rating">
                            <i class="fa fa-star" data-value="1"></i>
                            <i class="fa fa-star" data-value="2"></i>
                            <i class="fa fa-star" data-value="3"></i>
                            <i class="fa fa-star" data-value="4"></i>
                            <i class="fa fa-star" data-value="5"></i>
                        </div>
                    </div>

                    <div class="mb-3">
                        <!-- <label class="form-label">Feedback</label> -->
                        <textarea name="activity_feedback" class="form-control" placeholder="Write Feedback"
                            required></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary me-2" id="doneAndScheduleBtn">Done & Schedule
                            Next</button>
                        <button type="submit" class="btn btn-primary me-4">Done</button>
                        <a type="button" class="d-flex align-items-center text-success"
                            data-bs-dismiss="modal"><strong>Discard</strong></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>