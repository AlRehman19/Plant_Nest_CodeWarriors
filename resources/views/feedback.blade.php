
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<style>
        #feedback-form-wrapper #floating-icon > button {
    position: fixed;
    right: 0;
    top: 50%;
    transform: rotate(-90deg) translate(50%, -50%);
    transform-origin: right;
    }

    #feedback-form-wrapper .rating-input-wrapper input[type="radio"] {
    display: none;
    }
    #feedback-form-wrapper .rating-input-wrapper input[type="radio"] ~ span {
    cursor: pointer;
    }
    #feedback-form-wrapper .rating-input-wrapper input[type="radio"]:checked ~ span {
    background-color: #70c745;
    color: #fff;
    }
    #feedback-form-wrapper .rating-labels > label{
    font-size: 14px;
        color: #777;
    }
    .modal {
    transition: opacity 0.5s ease-in-out;
    opacity: 0;
    }

    /* Set opacity to 1 when modal is shown */
    .modal.show {
    opacity: 1;
    }



</style>
<!-- AOS Library CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha384-DEJzEL9u1lF+2bPxOn4oK5N0CS4Rc1OtEGJ78qz/Inw1oKOyFqjNtVzgW7nxV2P1" crossorigin="anonymous">

<!-- AOS Library JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha384-Dj6ntq5htPhArsQbS+7aGw9xiPEm5g4+0pD3flWzU8Z66TVm0UfDH1YwO8zGAMbG" crossorigin="anonymous"></script>


    <div id="feedback-form-wrapper">
        <div id="floating-icon">
          <button type="button" class="btn-sm rounded-0" style="background-color: #70c745;" data-toggle="modal" data-target="#exampleModal">
            Feedback
          </button>
      
        </div>
        <div id="feedback-form-modal" class="six">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-aos="fade-up" data-aos-duration="1000">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">How likely you would like to recommand us to your friends?</label>
                      <div class="rating-input-wrapper d-flex justify-content-between mt-2">
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">1</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">2</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">3</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">4</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">5</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">6</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">7</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">8</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">9</span></label>
                        <label><input type="radio" name="rating" /><span class="border rounded px-3 py-2">10</span></label>
                      </div>
                      <div class="rating-labels d-flex justify-content-between mt-1">
                        <label>Very unlikely</label>
                        <label>Very likely</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="input-one">What made you leave us so early?</label>
                      <input type="text" class="form-control" id="input-one" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="input-two">Would you like to say something?</label>
                      <textarea class="form-control" id="input-two" rows="3"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"  >close</button>
                  <button type="button" class="btn btn-secondary" style="background-color: #70c745;  color: white; border: none; " >Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>   
      
      <script>
        AOS.init();
      </script>
      
@endsection