<?php 
$email = $email ?? '';
$login_id = $login_id ?? '';
$mobile_no = $mobile_no ?? '';
?>


<div class="modal fade" id="emailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title">Verify Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <p>Email: <strong><?= $email ?></strong></p>

        <!-- send OTP / timer / resend -->
        <div id="emailSendWrapper">
          <button type="button" class="btn btn-primary w-100 mb-2" id="sendEmailOtpBtn">Send OTP</button>
          <div id="emailTimer" class="mb-2 d-none">Resend in <span id="emailTimerSeconds">60</span>s</div>
          <button type="button" id="emailResendBtn" class="btn btn-outline-secondary w-100 mb-2 d-none">Resend OTP</button>
        </div>

        <!-- OTP input + verify -->
        <div id="emailOtpWrapper" class="d-none">
          <input type="text" id="emailOtpInput" class="form-control mb-2" placeholder="Enter OTP" maxlength="6">
          <button type="button" id="verifyEmailOtpBtn" class="btn btn-success w-100">Verify OTP</button>
        </div>

        <div id="emailStatusMsg" class="mt-2 small text-muted"></div>
      </div>
    </div>
  </div>
</div>

<!-- MOBILE MODAL -->
<div class="modal fade" id="mobileModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title">Verify Mobile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <p>Mobile: <strong><?= $mobile_no ?></strong></p>

        <div id="mobileSendWrapper">
          <button type="button" class="btn btn-primary w-100 mb-2" id="sendMobileOtpBtn">Send OTP</button>
          <div id="mobileTimer" class="mb-2 d-none">Resend in <span id="mobileTimerSeconds">60</span>s</div>
          <button type="button" id="mobileResendBtn" class="btn btn-outline-secondary w-100 mb-2 d-none">Resend OTP</button>
        </div>

        <div id="mobileOtpWrapper" class="d-none">
          <input type="text" id="mobileOtpInput" class="form-control mb-2" placeholder="Enter OTP" maxlength="6">
          <button type="button" id="verifyMobileOtpBtn" class="btn btn-success w-100">Verify OTP</button>
        </div>

        <div id="mobileStatusMsg" class="mt-2 small text-muted"></div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade show" id="checked" tabindex="-1" data-bs-keyboard="false" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
            </div>
            <div class="modal-body p-0">
                
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-between">
                
            </div>
        </div>
    </div>
</div> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    if(localStorage.getItem('emailVerified')==='true'){
        document.getElementById('emailVerifiedIcon')?.classList.remove('d-none');
    }
    if(localStorage.getItem('mobileVerified')==='true'){
        document.getElementById('mobileVerifiedIcon')?.classList.remove('d-none');
    }

    let emailOtp, mobileOtp;
    let emailTimer, mobileTimer;

    // ⏳ Timer Function
    function startTimer(seconds, timerElem, resendBtn){
        let remaining = seconds;
        resendBtn.disabled = true;
        timerElem.classList.remove('d-none');
        timerElem.querySelector('span').innerText = remaining;

        let interval = setInterval(()=>{
            remaining--;
            timerElem.querySelector('span').innerText = remaining;
            if(remaining <= 0){
                clearInterval(interval);
                resendBtn.disabled = false;
                timerElem.classList.add('d-none');
            }
        },1000);
        return interval;
    }

    // ✅ EMAIL OTP FLOW
    document.getElementById('sendEmailOtpBtn').addEventListener('click', function(){
        emailOtp = Math.floor(100000 + Math.random() * 900000);
        console.log("Email OTP:", emailOtp);
        document.getElementById('emailStatusMsg').innerHTML = `OTP sent! (demo OTP=${emailOtp})`;
        document.getElementById('emailOtpWrapper').classList.remove('d-none');

        // hide send button & show resend
        this.classList.add('d-none');
        document.getElementById('emailResendBtn').classList.remove('d-none');

        if(emailTimer) clearInterval(emailTimer);
        emailTimer = startTimer(60, document.getElementById('emailTimer'), document.getElementById('emailResendBtn'));
    });

    document.getElementById('emailResendBtn').addEventListener('click', function(){
        emailOtp = Math.floor(100000 + Math.random() * 900000);
        console.log("Email OTP:", emailOtp);
        document.getElementById('emailStatusMsg').innerHTML = `OTP resent! (demo OTP=${emailOtp})`;

        if(emailTimer) clearInterval(emailTimer);
        emailTimer = startTimer(60, document.getElementById('emailTimer'), this);
    });

document.getElementById('verifyEmailOtpBtn').addEventListener('click', function(){
    let userOtp = document.getElementById('emailOtpInput').value;
    if(userOtp == emailOtp){
        localStorage.setItem('emailVerified','true');
        document.getElementById('emailVerifiedIcon')?.classList.remove('d-none');
        document.getElementById('verifyEmailOtpBtn').classList.add('d-none'); // ✅ hide verify button
        Swal.fire("✅ Success","Email verified successfully!","success");
        bootstrap.Modal.getInstance(document.getElementById('emailModal')).hide();
    } else {
        Swal.fire("❌ Invalid","OTP does not match!","error");
    }
});

    // ✅ MOBILE OTP FLOW
    document.getElementById('sendMobileOtpBtn').addEventListener('click', function(){
        mobileOtp = Math.floor(100000 + Math.random() * 900000);
        console.log("Mobile OTP:", mobileOtp);
        document.getElementById('mobileStatusMsg').innerHTML = `OTP sent! (demo OTP=${mobileOtp})`;
        document.getElementById('mobileOtpWrapper').classList.remove('d-none');

        // hide send button & show resend
        this.classList.add('d-none');
        document.getElementById('mobileResendBtn').classList.remove('d-none');

        if(mobileTimer) clearInterval(mobileTimer);
        mobileTimer = startTimer(60, document.getElementById('mobileTimer'), document.getElementById('mobileResendBtn'));
    });

    document.getElementById('mobileResendBtn').addEventListener('click', function(){
        mobileOtp = Math.floor(100000 + Math.random() * 900000);
        console.log("Mobile OTP:", mobileOtp);
        document.getElementById('mobileStatusMsg').innerHTML = `OTP resent! (demo OTP=${mobileOtp})`;

        if(mobileTimer) clearInterval(mobileTimer);
        mobileTimer = startTimer(60, document.getElementById('mobileTimer'), this);
    });

   document.getElementById('verifyMobileOtpBtn').addEventListener('click', function(){
    let userOtp = document.getElementById('mobileOtpInput').value;
    if(userOtp == mobileOtp){
        localStorage.setItem('mobileVerified','true');
        document.getElementById('mobileVerifiedIcon')?.classList.remove('d-none');
        document.getElementById('verifyMobileOtpBtn').classList.add('d-none'); // ✅ hide verify button
        Swal.fire("✅ Success","Mobile verified successfully!","success");
        bootstrap.Modal.getInstance(document.getElementById('mobileModal')).hide();
    } else {
        Swal.fire("❌ Invalid","OTP does not match!","error");
    }
});
});
</script>






