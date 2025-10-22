<!-- ================= Mark Done Modal ================= -->
<style>
.star-rating i {
    font-size: 18px;
    color: #ccc;
    cursor: pointer;
    transition: color .2s;
}

.star-rating i.active,
.star-rating i:hover {
    color: #fbc02d;
}
</style>

<div class="modal fade" id="toDomarkDoneModal" tabindex="-1" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mark Done</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="toDoMarkDoneForm" method="post">
                    <input type="hidden" name="todo_id" id="mark_done_todo_id">

                    <div class="mb-3">
                        <textarea name="to_do_feedback" class="form-control" placeholder="Write Feedback"
                            required></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Done</button>
                        <a type="button" class="d-flex align-items-center text-success"
                            data-bs-dismiss="modal"><strong>Discard</strong></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>