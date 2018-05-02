<nav id="wb-sm">
    <div class="topbar transparent" id="site--topbar">
        <h2 id="topicsMenu">Topics menu</h2>
        <div class="row">
            <div class="nav-container nav">
                <ul class="navbar-right" role="menubar">
                    <li class="top-nav--link" aria-hidden="false" id="homeLinkListItem">
                        <a href="/admin/" class="active" id="homeLink">Home</a>
                    </li>
                    <li class="top-nav--link hidden" id="browseLinkListItem">
                        <div id="browse">
                            <a href="javascript:void(0)" id="browseLink" onclick="JobPostAPI.showBrowseJobs();">Browse Jobs</a>
                        </div>
                    </li>
                    <li class="top-nav--link" id="profileLinkListItem" aria-hidden="true">
                        <a href="javascript:void(0)" class="hidden" id="profileLink" onclick="CreateEditProfileAPI.showCreateEditProfile();TalentCloudAPI.setNav('profileLinkListItem');">My Profile</a>
                    </li>
                    <li class="top-nav--link" id="jobPostersLinkListItem" aria-hidden="true">
                        <a href="javascript:void(0)" class="hidden" id="jobPostersLink" onclick="CreateJobPosterAPI.showCreateJobPosterForm(this);TalentCloudAPI.setNav('jobPostersLinkListItem');">JobPoster</a>
                    </li>
                    <!--li class="top-nav--link" id="teamsLinkListItem" aria-hidden="true">
                        <a href="#" class="hidden" id="teamsLink">My Teams</a>
                    </li-->
                    <li class="top-nav--link" id="registerLinkListItem">
                        <div id="register">
                            <a href="javascript:void(0)" id="registerLink" onclick="UserAPI.showRegisterForm(this)">Register</a>
                        </div>
                    </li>
                    <li class="top-nav--link">
                        <?php
                            $hasUser = null;
                            if (isset($oidc)) {
                                $hasUser = $oidc->requestUserInfo("name");
                            }
                        ?>
                        <div id="loggedOut" class="<?php echo($hasUser!=null?"hidden":""); ?>">
                            <?php 
                                $loginLink = "";
                                $loginLink .= OPENID_URI.AUTH_URI;
                                $loginLink .= "?response_type=".URL_RESPONSE_TYPES;
                                $loginLink .= "&redirect_uri=".urlencode(REDIRECT_URI_ADMIN);
                                $loginLink .= "&nonce=".$nonce;
                                $loginLink .= "&state=".$state;
                                $loginLink .= "&client_id=".CLIENT_ID;
                                $loginLink .= "&scope=".SCOPE;
                                $loginLink .= "&prompt=consent";
                                echo("<a href=\"".$loginLink."\" id=\"loginLink\">Login</a>"); 
                            ?>
                        </div>
                    </li>
                    <li class="top-nav--link">
                        
                        <div id="loggedIn" class="<?php echo($hasUser==null?"hidden":""); ?>">
                            <a href="javascript:void(0)" id ="logoutLink" onclick="UserAPI.logout()">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
