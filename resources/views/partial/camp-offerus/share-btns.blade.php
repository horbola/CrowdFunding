<div id="share-btns" data-camp-id="{{ $campaign->isActive() ? 1 : 0 }}">
    <div id="shareModal">
        <div id="share"></div>
        <div class="inner d-none">
            <ul class="social-icons">
                <li>
                    <a href="#" id="gmail-btn">
                       <i class="fa fa-envelope-o" aria-hidden="true" style="color: #cf3e39; font-size: 2rem"></i>
                    </a>
                </li>
                <li> 
                    <a href="#" id="facebook-btn">
                       <i class="fa fa-facebook-square" aria-hidden="true" style="color: #3b5998; font-size: 2rem"></i>
                    </a>
                </li>
                <li>
                    <a href="#" id="twitter-btn">
                       <i class="fa fa-twitter-square" aria-hidden="true" style="color: #1da1f2; font-size: 2rem"></i>
                    </a>
                </li>
                <li>
                    <a href="#" id="linkedin-btn">
                       <i class="fa fa-linkedin-square" aria-hidden="true" style="color: #0077b5; font-size: 2rem"></i>
                    </a>
                </li>
                <li>
                    <a href="#" id="whatsapp-btn">
                       <i class="fa fa-whatsapp" aria-hidden="true" style="color: #25d366; font-size: 2rem"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <p class="share-img" id="mobile-share">
        <img class="img-fluid verimg" src="/images/icons/share.png" alt=""> Share
    </p>
</div>
