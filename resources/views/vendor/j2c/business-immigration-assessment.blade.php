<x-frontend-layout>
    <!--Slider Section Start-->
    <div id="slider">
        <div id="first-slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade">
                <div class="carousel-inner" role="listbox">
                    <!-- Item 1 -->
                    <div class="item active slide1">
                        <img src="images/banner/form2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--start our classes sections -->
    <!-- About Us Area -->
    <section id="" class=" row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                <div class="tittle wow fadeInUpBig " style="text-align:left;">
                    <h1 class="welc-text">
                        Business Immigration Assessment</h1><br>
                </div>
                <div class="skilled-worker-form">
                    <div class="form-div">
                        <h4>CONFIDENTIAL WHEN COMPLETED.</h4>
                        Just To Canada case assessment specialists will use the collected information from this form to
                        assess all Canadian immigration possibilities. None of the information will be shared with any
                        third
                        parties for any purposes whatsoever.
                        <br>
                        <br>
                        <div class="form-inner">
                            <div id="skilled-worker-form">
                                <form class="form" style="margin-top:15px;position:relative;">
                                    <div v-if="loading" class="loading-overlay">
                                        <div class="loader">
                                            <div class="lds-ring">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="errors.fullname ? 'form-group has-error' : 'form-group'">
                                            Full Name<span class="spanHighlight">*</span> (As per
                                            your passport)
                                            <div class="">
                                                <input name="fullname" class="form-control col-12"
                                                    v-model="model.fullname">
                                                <span v-if="errors.fullname" id="helpBlock2"
                                                    class="help-block">@{{ errors.fullname }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="errors.email ? 'form-group has-error' : 'form-group'">
                                            E-mail<span class="spanHighlight">*</span> (As per your
                                            passport)
                                            <div class="">
                                                <input @auth('web') readonly="true" @endauth name="email"
                                                    class="form-control col-12" v-model.lazy="model.email">
                                                <span v-if="errors.email" id="helpBlock2"
                                                    class="help-block">@{{ errors.email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div :class="errors.phone ? 'form-group has-error' : 'form-group'">
                                            Phone Number (with country and area code)<span
                                                class="spanHighlight">*</span>
                                            <div class="">
                                                <input name="phone" class="form-control col-12" v-model="model.phone">
                                                <span v-if="errors.phone" id="helpBlock2"
                                                    class="help-block">@{{ errors.phone }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="errors.country ? 'form-group has-error' : 'form-group'">
                                            What is your current country of residence?<span
                                                class="spanHighlight">*</span>
                                            <div class="">
                                                <select class="form-control col-12" id="country" name="country"
                                                    v-model="model.country">
                                                    <option value="">--Select--</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ Str::slug($country->name, '_') }}">
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span v-if="errors.country"
                                                    class="help-block">@{{ errors.country }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div :class="errors.nationality ? 'form-group has-error' : 'form-group'">
                                            What is your nationality?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <input name="nationality" class="form-control col-12"
                                                    v-model="model.nationality">
                                                <span v-if="errors.nationality" id="helpBlock2"
                                                    class="help-block">@{{ errors.nationality }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div :class="errors.reference ? 'form-group has-error' : 'form-group'">
                                            Who provided you our reference?*<span class="spanHighlight">*</span>
                                            <div class="">
                                                <input name="reference" class="form-control col-12"
                                                    v-model="model.reference">
                                                <span v-if="errors.reference" id="helpBlock2"
                                                    class="help-block">@{{ errors.reference }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div
                                            :class="errors.currently_in_canada ? 'form-group has-error' : 'form-group'">
                                            Are you currently in Canada ?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.currently_in_canada" value="yes">
                                                    Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.currently_in_canada" value="no">
                                                    No
                                                </label>
                                                <span v-if="errors.currently_in_canada"
                                                    class="help-block">@{{ errors.currently_in_canada }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-8">
                                        <div :class="errors.experience ? 'form-group has-error' : 'form-group'">
                                            Please select which experience pertains to you<span
                                                class="spanHighlight">*</span>
                                            <br>
                                            <input type="radio" v-model="model.experience" value="business_person">
                                            Business Person
                                            <br>
                                            <input type="radio" v-model="model.experience" value="senior_manager">
                                            Senior Manager
                                            <br>
                                            <input type="radio" v-model="model.experience" value="self_employed_artist">
                                            Self Employed
                                            Artist
                                            <br>
                                            <span v-if="errors.experience"
                                                class="help-block">@{{ errors.experience }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-md-12">
                                        What area of business or management experience have you
                                        acquired in the past 10 years (you can select more than one option)<span
                                            class="spanHighlight">*</span>

                                        <input type="checkbox" value="manufacturing" v-model="model.aoi" />
                                        Manufacturing / trading
                                        <br>
                                        <input type="checkbox" value="trading" v-model="model.aoi" /> Only trading /
                                        Import /
                                        Export
                                        <br>
                                        <input type="checkbox" value="project" v-model="model.aoi" /> Project work
                                        (builder /
                                        Construction etc)
                                        <br>
                                        <input type="checkbox" value="wholesale" v-model="model.aoi" /> Wholesale /
                                        Retail
                                        establishment
                                        <br>
                                        <input type="checkbox" value="consulting" v-model="model.aoi" /> Consulting
                                        <br>
                                        <input type="checkbox" value="other" v-model="model.aoi" /> Other
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            Briefly describe product/commodity you deal in your
                                            business<span class="spanHighlight">*</span>
                                            <textarea id="further_info" name="describe" class="form-control "
                                                v-model="model.describe" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.qualification ? 'form-group has-error' : 'form-group'">
                                            What is your education qualification?<span class="spanHighlight">*</span>
                                            <br>
                                            <input type="radio" v-model="model.qualification" value="1"> Post graduate
                                            <br>
                                            <input type="radio" v-model="model.qualification" value="2"> Bachelors
                                            degree (15 years of
                                            education)<br>

                                            <input type="radio" v-model="model.qualification" value="3"> Did not
                                            complete Bachelors
                                            degree<br>

                                            <input type="radio" v-model="model.qualification" value="4"> Grade 12
                                            education with at least one
                                            year diploma / certificate<br>

                                            <input type="radio" v-model="model.qualification" value="5"> Grade 12
                                            (Secondary school)
                                            completed<br>

                                            <input type="radio" v-model="model.qualification" value="6"> Grade 10
                                            completed<br>

                                            <input type="radio" v-model="model.qualification" value="7"> Grade 10 not
                                            completed<br>

                                            <input type="radio" v-model="model.qualification" value="8"> Other<br>
                                            <span v-if="errors.qualification"
                                                class="help-block">@{{ errors.qualification }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <div :class="errors.dob ? 'form-group has-error' : 'form-group'">
                                            Date of birth of Principal Applicant<span class="spanHighlight">*</span>

                                            <input type="date" id="dob" name="dob" class="form-control col-12"
                                                v-model="model.dob" />
                                            <span v-if="errors.dob" class="help-block">@{{ errors.dob }}</span>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.marital_status ? 'form-group has-error' : 'form-group'">
                                            Marital status<span class="spanHighlight">*</span>
                                            <br>
                                            <input type="radio" v-model="model.marital_status" value="married"> Married
                                            <br>
                                            <input type="radio" v-model="model.marital_status" value="divorced">
                                            Divorced
                                            <br>
                                            <input type="radio" v-model="model.marital_status"
                                                value="legally_seperated"> Legally separated
                                            <br>
                                            <input type="radio" v-model="model.marital_status" value="never_married">
                                            Never Married
                                            <br>
                                            <span v-if="errors.marital_status"
                                                class="help-block">@{{ errors.marital_status }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <template v-if="model.marital_status == 'married'">
                                        <div class="col-md-4">
                                            <div :class="errors.spouse_dob ? 'form-group has-error' : 'form-group'">
                                                Spouse's date of birth
                                                <div class="">
                                                    <input type="date" id="spouse_dob" name="spouse_dob"
                                                        class="form-control col-12" v-model="model.spouse_dob" />
                                                    <span v-if="errors.spouse_dob"
                                                        class="help-block">@{{ errors.spouse_dob }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.spouse_experience ? 'form-group has-error' : 'form-group'">
                                                Your spouse's experience?<span class="spanHighlight">*</span>
                                                <div class="">
                                                    <input type="radio" v-model="model.spouse_experience" value="1">
                                                    Work Experience as a
                                                    Business
                                                    person
                                                    <br>
                                                    <input type="radio" v-model="model.spouse_experience" value="2">
                                                    Work Experience as a Skilled
                                                    Worker
                                                    <br>
                                                    <input type="radio" v-model="model.spouse_experience" value="3"> Not
                                                    employed
                                                    currently
                                                    <br>
                                                    <input type="radio" v-model="model.spouse_experience" value="4">
                                                    Never employed
                                                    <br>
                                                    <input type="radio" v-model="model.spouse_experience" value="5"> NA
                                                    <br>
                                                    <span v-if="errors.spouse_experience"
                                                        class="help-block">@{{ errors.spouse_experience }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </template>
                                    <template
                                        v-if="model.marital_status == 'married' || model.marital_status == 'divorced' || model.marital_status == 'legally_seperated'">
                                        <div class="col-md-4">
                                            <div
                                                :class="errors.no_of_children ? 'form-group has-error' : 'form-group'">
                                                How many children do you have?<span class="spanHighlight">*</span>
                                                <div class="">
                                                    <select class="form-control col-12" id="no_of_children"
                                                        name="no_of_children" v-model="model.no_of_children">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                    <span v-if="errors.no_of_children"
                                                        class="help-block">@{{ errors.no_of_children }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.has_children_lt_22 ? 'form-group has-error' : 'form-group'">
                                                Do you have children less than 22 years of age?
                                                You
                                                can include them in your PR application*<span
                                                    class="spanHighlight">*</span>
                                                <div class="">
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.has_children_lt_22"
                                                            value="yes"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.has_children_lt_22"
                                                            value="no"> No
                                                    </label>
                                                    <span v-if="errors.has_children_lt_22"
                                                        class="help-block">@{{ errors.has_children_lt_22 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.children_enrolled ? 'form-group has-error' : 'form-group'">
                                                Do you have children enrolled in accredited
                                                Canadian education institution/s and are actively pursuing academic,
                                                professional or vocational
                                                training on a full-time basis?<span class="spanHighlight">*</span>
                                                <div class="">
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.children_enrolled"
                                                            value="yes"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.children_enrolled"
                                                            value="no"> No
                                                    </label>
                                                    <span v-if="errors.children_enrolled"
                                                        class="help-block">@{{ errors.children_enrolled }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.children_canadian ? 'form-group has-error' : 'form-group'">
                                                Do you have any of your children who are
                                                Canadian
                                                citizens or permanent residents of Canada?<span
                                                    class="spanHighlight">*</span>
                                                <div class="">
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.children_canadian"
                                                            value="yes"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.children_canadian"
                                                            value="no"> No
                                                    </label>
                                                    <span v-if="errors.children_canadian"
                                                        class="help-block">@{{ errors.children_canadian }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.children_mental ? 'form-group has-error' : 'form-group'">
                                                Do you, your spouse or your children have a
                                                physical or mental disorder that requires medical attention?<span
                                                    class="spanHighlight">*</span>
                                                <div class="">
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.children_mental" value="yes">
                                                        Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.children_mental" value="no">
                                                        No
                                                    </label>
                                                    <span v-if="errors.children_mental"
                                                        class="help-block">@{{ errors.children_mental }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </template>
                                    <div class="col-md-12">
                                        <div :class="errors.ordered_to_leave ? 'form-group has-error' : 'form-group'">
                                            Have you been ordered to leave Canada or any other
                                            country?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.ordered_to_leave" value="yes">
                                                    Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.ordered_to_leave" value="no"> No
                                                </label>
                                                <span v-if="errors.ordered_to_leave"
                                                    class="help-block">@{{ errors.ordered_to_leave }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.arrested ? 'form-group has-error' : 'form-group'">
                                            Have you ever committed, been arrested for, or been
                                            charged with any offense in any country, including driving under the
                                            influence of alcohol or
                                            drugs?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.arrested" value="yes"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.arrested" value="no"> No
                                                </label>
                                                <span v-if="errors.arrested"
                                                    class="help-block">@{{ errors.arrested }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.been_military ? 'form-group has-error' : 'form-group'">
                                            Have you ever been in the military (including
                                            mandatory
                                            service), a militia, or a civil defense unit or the police?<span
                                                class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.been_military" value="yes"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.been_military" value="no"> No
                                                </label>
                                                <span v-if="errors.been_military"
                                                    class="help-block">@{{ errors.been_military }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.employed_security ? 'form-group has-error' : 'form-group'">
                                            Have you ever been employed by a government in a
                                            security-related capacity?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.employed_security" value="yes">
                                                    Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.employed_security" value="no"> No
                                                </label>
                                                <span v-if="errors.employed_security"
                                                    class="help-block">@{{ errors.employed_security }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.visited ? 'form-group has-error' : 'form-group'">
                                            Have you visited other countries within the last 10
                                            years?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.visited" value="yes"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.visited" value="no"> No
                                                </label>
                                                <span v-if="errors.visited"
                                                    class="help-block">@{{ errors.visited }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <template v-if="model.visited == 'yes'">
                                        <div class="col-md-4">
                                            <div
                                                :class="errors.visited_countries ? 'form-group has-error' : 'form-group'">
                                                If Yes, please list the
                                                countries<span class="spanHighlight">*</span>
                                                <div class="">
                                                    <select multiple class="form-control col-12" id="visited_countries"
                                                        name="visited_countries" v-model="model.visited_countries">
                                                        <option value="0">--Select--</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ Str::slug($country->name, '_') }}">
                                                                {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span v-if="errors.visited_countries"
                                                        class="help-block">@{{ errors.visited_countries }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </template>
                                    <div class="col-md-12">
                                        <div
                                            :class="errors.has_blood_relative ? 'form-group has-error' : 'form-group'">
                                            Do you or your spouse have blood relatives in
                                            Canada?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.has_blood_relative" value="yes">
                                                    Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.has_blood_relative" value="no">
                                                    No
                                                </label>
                                                <span v-if="errors.has_blood_relative"
                                                    class="help-block">@{{ errors.has_blood_relative }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <template v-if="model.has_blood_relative == 'yes'">
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.relative_province ? 'form-group has-error' : 'form-group'">
                                                If yes, please state the province they reside in
                                                (you
                                                can select more than one)<span class="spanHighlight">*</span>
                                                <div class="">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="british_columbia"
                                                                v-model="model.relative_province" />
                                                            British
                                                            Columbia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="alberta"
                                                                v-model="model.relative_province" />
                                                            Alberta</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="saskatchewan"
                                                                v-model="model.relative_province" />
                                                            Saskatchewan</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="manitoba"
                                                                v-model="model.relative_province" />
                                                            Manitoba</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="ontario"
                                                                v-model="model.relative_province" />
                                                            Ontario</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="quebec"
                                                                v-model="model.relative_province" />
                                                            Quebec</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="nova_scotia"
                                                                v-model="model.relative_province" /> Nova
                                                            Scotia</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="new_brunswick"
                                                                v-model="model.relative_province" /> New
                                                            Brunswick</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="prince_edward_island"
                                                                v-model="model.relative_province" />
                                                            Prince
                                                            Edward Island</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="newfoundland_and_labrador"
                                                                v-model="model.relative_province" /> Newfoundland &
                                                            Labrador</label>
                                                    </div>
                                                    <span v-if="errors.relative_province"
                                                        class="help-block">@{{ errors.relative_province }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </template>
                                    <div class="col-md-12">
                                        <div :class="errors.visited_canada ? 'form-group has-error' : 'form-group'">
                                            Have you ever visited Canada ?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.visited_canada" value="yes"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.visited_canada" value="no"> No
                                                </label>
                                                <span v-if="errors.visited_canada"
                                                    class="help-block">@{{ errors.visited_canada }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <template v-if="model.visited_canada == 'yes'">
                                        <div class="col-md-12">
                                            <div :class="errors.visited_in_2 ? 'form-group has-error' : 'form-group'">
                                                Did you visit Canada in the last 2 years?*<span
                                                    class="spanHighlight">*</span>
                                                <div class="">
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.visited_in_2" value="yes">
                                                        Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" v-model="model.visited_in_2" value="no"> No
                                                    </label>
                                                    <span v-if="errors.visited_in_2"
                                                        class="help-block">@{{ errors.visited_in_2 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <template v-if="model.visited_in_2 == 'yes'">
                                            <div class="col-md-12">
                                                <div
                                                    :class="errors.visited_province ? 'form-group has-error' : 'form-group'">
                                                    If yes, please state the provinces visited (you
                                                    can
                                                    select more than one)<span class="spanHighlight">*</span>
                                                    <div class="">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="british_columbia"
                                                                    v-model="model.visited_province" />
                                                                British
                                                                Columbia</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="alberta"
                                                                    v-model="model.visited_province" />
                                                                Alberta</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="saskatchewan"
                                                                    v-model="model.visited_province" />
                                                                Saskatchewan</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="manitoba"
                                                                    v-model="model.visited_province" />
                                                                Manitoba</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="ontario"
                                                                    v-model="model.visited_province" />
                                                                Ontario</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="quebec"
                                                                    v-model="model.visited_province" />
                                                                Quebec</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="nova_scotia"
                                                                    v-model="model.visited_province" /> Nova
                                                                Scotia</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="new_brunswick"
                                                                    v-model="model.visited_province" /> New
                                                                Brunswick</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="prince_edward_island"
                                                                    v-model="model.visited_province" /> Prince
                                                                Edward Island</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="newfoundland_and_labrador"
                                                                    v-model="model.visited_province" /> Newfoundland &
                                                                Labrador</label>
                                                        </div>
                                                        <span v-if="errors.relative_province"
                                                            class="help-block">@{{ errors.visited_province }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </template>
                                    </template>
                                    <div class="col-md-12">
                                        <div :class="errors.refused ? 'form-group has-error' : 'form-group'">
                                            Has your visa to Canada ever been refused?<span
                                                class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.refused" value="yes"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.refused" value="no"> No
                                                </label>
                                                <span v-if="errors.refused"
                                                    class="help-block">@{{ errors.refused }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <template v-if="model.refused == 'yes'">
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.refused_detail ? 'form-group has-error' : 'form-group'">
                                                If Yes, please provide when and related
                                                detail<span class="spanHighlight">*</span>
                                                (As per
                                                your passport)
                                                <div class="">
                                                    <input name="refused_detail" class="form-control col-12"
                                                        v-model="model.refused_detail">
                                                    <span v-if="errors.refused_detail" id="helpBlock2"
                                                        class="help-block">@{{ errors.refused_detail }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </template>
                                    <div class="col-md-12">
                                        <div :class="errors.assets ? 'form-group has-error' : 'form-group'">
                                            Between you and your spouse, please calculate the
                                            total
                                            value of your assets, including movable, immovable property/properties, cash
                                            in the bank, mutual
                                            funds,
                                            fixed deposits, etc. Please calculate in Canadian dollars. If you wish to
                                            convert from any currency
                                            to
                                            Canadian dollars, please visit www.xe.com. Please remember to include and
                                            assess only those assets
                                            that
                                            are in your and your spouse's name.<span class="spanHighlight">*</span>
                                            <div class="">

                                                <input type="radio" v-model="model.assets" value="1"> $100,000 to
                                                $199,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="2"> $200,000 to
                                                $299,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="3"> $300,000 to
                                                $399,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="4"> $400,000 to
                                                $499,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="5"> $500,000 to
                                                $599,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="6"> $600,000 to
                                                $799,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="7"> $800,000 to
                                                $999,000
                                                <br>
                                                <input type="radio" v-model="model.assets" value="8"> $1 million to $2
                                                million
                                                <br>
                                                <input type="radio" v-model="model.assets" value="9"> $2 million and up
                                                <br>
                                                <span v-if="errors.assets"
                                                    class="help-block">@{{ errors.assets }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div :class="errors.language_test ? 'form-group has-error' : 'form-group'">
                                            Have you taken English proficiency test (IELTS or
                                            CELPIP) ?<span class="spanHighlight">*</span>
                                            <div class="">
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.language_test" value="yes"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" v-model="model.language_test" value="no"> No
                                                </label>
                                                <span v-if="errors.language_test"
                                                    class="help-block">@{{ errors.language_test }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <template v-if="model.language_test == 'yes'">
                                        <div class="col-md-12">
                                            If yes, what is your score in
                                            <div class="row">
                                                <div class="col-xs-6 form">
                                                    <div class="form-group px-2">
                                                        <label for="read_score">Reading</label>
                                                        <input name="read_score" class="form-control"
                                                            v-model="model.read_score" type="number" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 form">
                                                    <div class="form-group px-2">
                                                        <label for="speak_score">Speaking</label>
                                                        <input name="speak_score" class="form-control"
                                                            v-model="model.speak_score" type="number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6 form">
                                                    <div class="form-group px-2">
                                                        <label for="write_score">Writing</label>
                                                        <input name="write_score" class="form-control"
                                                            v-model="model.write_score" type="number" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 form">
                                                    <div class="form-group px-2">
                                                        <label for="listen_score">Listening</label>
                                                        <input name="listen_score" class="form-control"
                                                            v-model="model.listen_score" type="number" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template v-if="model.language_test == 'no'">
                                        <div class="col-md-12">
                                            <div
                                                :class="errors.language_proficiency ? 'form-group has-error' : 'form-group'">
                                                If you have not taken an English proficiency
                                                test,
                                                how do you rate your English language proficiency?
                                                <div class="">
                                                    <input type="radio" v-model="model.language_proficiency" value="1">
                                                    Very Good / Fluent
                                                    <br>
                                                    <input type="radio" v-model="model.language_proficiency" value="2">
                                                    Moderate to Good
                                                    <br>
                                                    <input type="radio" v-model="model.language_proficiency" value="3">
                                                    With difficulty
                                                    <br>
                                                    <span v-if="errors.language_proficiency"
                                                        class="help-block">@{{ errors.language_proficiency }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </template>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            Comments
                                            <div class="">
                                                <textarea id="comments" name="comments" class="form-control "
                                                    v-model="model.comments" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <div
                                            :class="errors.interested_programs ? 'form-group has-error' : 'form-group'">
                                            I am interested in the following
                                            Canada's
                                            business
                                            immigration / business work permit programs (you can select one or more
                                            options)<span class="spanHighlight">*</span>
                                            <div class="">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1"
                                                            v-model="model.interested_programs" /> Canada Start Up Visa
                                                        leading to permanent residence in Canada</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="2"
                                                            v-model="model.interested_programs" /> I operate my own
                                                        business
                                                        and world like to se up a branch / office in Canada and world
                                                        like to be transferred to the
                                                        Canadian Operation</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="3"
                                                            v-model="model.interested_programs" /> My current company
                                                        intends to transfer me to Canada by setting up their branch /
                                                        subsidiary in Canada</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="4"
                                                            v-model="model.interested_programs" /> Canada's personal
                                                        Nominee
                                                        program for business person & Senior Managers</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="5"
                                                            v-model="model.interested_programs" /> LMIA / work permit
                                                        as
                                                        a
                                                        business owner / operator in Canada</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="6"
                                                            v-model="model.interested_programs" /> I am open to Discuss
                                                        all
                                                        applicable options</label>
                                                </div>
                                                <span v-if="errors.interested_programs"
                                                    class="help-block">@{{ errors.interested_programs }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <div :class="errors.prefered_location ? 'form-group has-error' : 'form-group'">
                                            <strong>I prefer to settle in one of the following provinces
                                                Canada:</strong>*<span class="spanHighlight">*</span>
                                            <div class="">
                                                <select class="form-control col-12" id="prefered_location"
                                                    name="prefered_location" v-model="model.prefered_location">
                                                    <option value="alberta"> Alberta</option>
                                                    <option value="british_columbia"> British Columbia</option>
                                                    <option value="manitoba"> Manitoba</option>
                                                    <option value="new_brunswick"> New Brunswick</option>
                                                    <option value="newfoundland_and_labrador"> Newfoundland and Labrador
                                                    </option>
                                                    <option value="nova_scotia"> Nova Scotia</option>
                                                    <option value="northwest_territories"> Northwest Territories
                                                    </option>
                                                    <option value="nunavut"> Nunavut</option>
                                                    <option value="ontario"> Ontario</option>
                                                    <option value="prince_edward_island"> Prince Edward Island</option>
                                                    <option value="quebec"> Quebec</option>
                                                    <option value="saskatchewan"> Saskatchewan</option>
                                                    <option value="yukon"> Yukon</option>
                                                </select>
                                                <span v-if="errors.prefered_location"
                                                    class="help-block">@{{ errors.prefered_location }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @guest
                                        <div class="clearfix"></div>
                                        <div class="">
                                            @{{ account_exists ? 'Enter your account password to submit' : 'Create password' }}</div>
                                        <div class="col-md-4">
                                            <div :class="errors.password ? 'form-group has-error' : 'form-group'">
                                                Password
                                                <div class="">
                                                    <input type="password" class="form-control col-12"
                                                        v-model="model.password">
                                                    <span v-if="errors.password"
                                                        class="help-block">@{{ errors.password }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-4">
                                            <div class="form-group" v-if="!account_exists">
                                                Confirm Password
                                                <div class="">
                                                    <input type="password" class="form-control col-12"
                                                        v-model="model.password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                    @endguest
                                    <div class="clearfix"></div>
                                    <div class="my-3">Thank you for completing this questionnaire. It will
                                        help us to assess your
                                        Canadian immigration qualifications as accurately as possible and we will be
                                        able to discuss relocation
                                        options.</div>
                                    <div class="row flex justify-center mt-4">
                                        <button type="submit" class="btn btn-secondary"
                                            @click.prevent="submit()">Submit</button>
                                    </div>
                                </form>
                                <div id="jGrowl-container1" class="jGrowl top-right"></div>
                                @push('scripts-top')
                                    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
                                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>
                                @endpush
                                @push('css-top')
                                    <link rel="stylesheet" type="text/css"
                                        href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />
                                @endpush
                                @push('scripts')
                                    <script>
                                        var app = new Vue({
                                            el: '#skilled-worker-form',
                                            data() {
                                                return {
                                                    show_success: false,
                                                    loading: false,
                                                    account_exists: 0,
                                                    model: {
                                                        fullname: null,
                                                        email: '{{ Auth::check() ? Auth::user()->email : '' }}',
                                                        phone: null,
                                                        country: null,
                                                        nationality: null,
                                                        reference: null,
                                                        currently_in_canada: null,
                                                        experience: null,
                                                        aoi: [],
                                                        describe: '',
                                                        qualification: null,
                                                        dob: null,
                                                        marital_status: null,
                                                        spouse_dob: null,
                                                        spouse_experience: null,
                                                        no_of_children: 0,
                                                        has_children_lt_22: null,
                                                        children_enrolled: null,
                                                        children_canadian: null,
                                                        children_mental: null,
                                                        ordered_to_leave: null,
                                                        arrested: null,
                                                        been_military: null,
                                                        employed_security: null,
                                                        visited: null,
                                                        visited_countries: [],
                                                        has_blood_relative: null,
                                                        relative_province: [],
                                                        visited_canada: null,
                                                        visited_in_2: null,
                                                        visited_province: [],
                                                        refused: null,
                                                        refused_detail: null,
                                                        assets: null,
                                                        language_test: null,
                                                        read_score: null,
                                                        write_score: null,
                                                        speak_score: null,
                                                        listen_score: null,
                                                        language_proficiency: null,
                                                        comments: '',
                                                        interested_programs: [],
                                                        prefered_location: null,
                                                    },
                                                    errors: {
                                                        fullname: null,
                                                        email: null,
                                                        phone: null,
                                                        country: null,
                                                        nationality: null,
                                                        reference: null,
                                                        currently_in_canada: null,
                                                        experience: null,
                                                        aoi: null,
                                                        describe: null,
                                                        qualification: null,
                                                        dob: null,
                                                        marital_status: null,
                                                        spouse_dob: null,
                                                        spouse_experience: null,
                                                        no_of_children: 0,
                                                        has_children_lt_22: null,
                                                        children_enrolled: null,
                                                        children_canadian: null,
                                                        children_mental: null,
                                                        ordered_to_leave: null,
                                                        arrested: null,
                                                        been_military: null,
                                                        employed_security: null,
                                                        visited: null,
                                                        visited_countries: null,
                                                        has_blood_relative: null,
                                                        relative_province: null,
                                                        visited_canada: null,
                                                        visited_in_2: null,
                                                        visited_province: null,
                                                        refused: null,
                                                        refused_detail: null,
                                                        assets: null,
                                                        language_test: null,
                                                        read_score: null,
                                                        write_score: null,
                                                        speak_score: null,
                                                        listen_score: null,
                                                        language_proficiency: null,
                                                        comments: null,
                                                        interested_programs: null,
                                                        prefered_location: null,
                                                    }
                                                }
                                            },
                                            mounted() {},
                                            computed: {
                                                email() {
                                                    return this.model.email
                                                }
                                            },
                                            watch: {
                                                email(newV, oldV) {
                                                    this.loading = true
                                                    axios.post('{{ route('check-account-exists') }}', {
                                                        email: newV
                                                    }).then((res) => {
                                                        if (res.data.message == 'exists') {
                                                            this.account_exists = true;
                                                        } else {
                                                            this.account_exists = false;
                                                        }
                                                    }).finally(() => {
                                                        this.loading = false;
                                                    });
                                                }
                                            },
                                            methods: {
                                                submit() {
                                                    var route = '{{ route('business-immigration-form-submit') }}'
                                                    var data = this.model
                                                    this.loading = true
                                                    axios.post(route, data).then((res) => {
                                                        if (res.data.message == 'success') {
                                                            window.location.href = '{{ route('skilled-worker-thank') }}'
                                                        }
                                                    }).catch((error) => {
                                                        if (error.response.status == 422) {
                                                            Object.keys(this.errors).forEach((k) => {
                                                                this.errors[k] = null
                                                            })
                                                            Object.keys(error.response.data.errors).forEach((key) => {
                                                                this.errors[key] = error.response.data.errors[key][0]
                                                            })
                                                            Vue.nextTick(() => {
                                                                this.$refs.fullname.focus()
                                                            })
                                                            $('#jGrowl-container1').jGrowl(
                                                                "There are errors in form. Please correct them before moving forward", {
                                                                    position: 'bottom-left',
                                                                    group: 'alert-danger',
                                                                });
                                                        }
                                                        if (error.response.status == 419) {
                                                            $('#jGrowl-container1').jGrowl(
                                                                "Session Expired. Please Refresh this page", {
                                                                    position: 'bottom-left',
                                                                    group: 'alert-danger',
                                                                });
                                                        }
                                                    }).finally(() => {
                                                        this.loading = false
                                                    })
                                                }
                                            }
                                        })
                                    </script>
                                @endpush
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->
</x-frontend-layout>
