<div class="w-full">
    <div class="text-2xl my-4 text-center">Application ID: {{ $afdata->application_id }}</div>
    <table class="w-full table table-hover">
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Personal Details</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $afdata->typable->salution . $afdata->typable->firstname . ' ' . $afdata->typable->lastname }}</td>
        </tr>
        <tr>
            <td>Marital Status</td>
            <td>{{ $afdata->typable->marital_status }}</td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>{{ \Carbon\Carbon::parse($afdata->dob)->toFormattedDateString() }}</td>
        </tr>
        @if ($afdata->getRawOriginal('marital_status') == 2)
            <tr>
                <td>Spouse's Date of Birth</td>
                <td>{{ \Carbon\Carbon::parse($afdata->spouse_dob)->toFormattedDateString() }}</td>
            </tr>
        @endif
        <tr>
            <td>Country of citizenship</td>
            <td>{{ $afdata->typable->country->name }}</td>
        </tr>
        <tr>
            <td>Current country of citizenship</td>
            <td>{{ $afdata->typable->resident_country->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $afdata->user->email }}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{ $afdata->typable->phone ?: 'NIL' }}</td>
        </tr>
        <tr>
            <td>Fax</td>
            <td>{{ $afdata->typable->fax ?: 'NIL' }}</td>
        </tr>
        <tr>
            <td>Area of Interest</td>
            <td>
                <ul>
                    @foreach ($afdata->typable->aoi as $a)
                        <li>{{ $a }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>Further Information</td>
            <td>{{ $afdata->typable->further_info }}</td>
        </tr>
        @if ($afdata->typable->resume_uri)
            <tr>
                <td>Resume</td>
                <td><a href="{{ route('download-resume', $afdata->id) }}">Click here to download</a>
                </td>
            </tr>
        @endif
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Children</td>
        </tr>
        <tr>
            <td>No. of Children</td>
            <td>{{ $afdata->typable->children->no_of_children == 6 ? '6+' : $afdata->typable->children->no_of_children }}
            </td>
        </tr>
        @if ($afdata->typable->children->no_of_children >= 1)
            <tr>
                <td>Age of Child 1</td>
                <td>{{ $afdata->typable->children->child_1_age }}</td>
            </tr>
        @endif
        @if ($afdata->typable->children->no_of_children >= 2)
            <tr>
                <td>Age of Child 1</td>
                <td>{{ $afdata->typable->children->child_2_age }}</td>
            </tr>
        @endif
        @if ($afdata->typable->children->no_of_children >= 3)
            <tr>
                <td>Age of Child 1</td>
                <td>{{ $afdata->typable->children->child_3_age }}</td>
            </tr>
        @endif
        @if ($afdata->typable->children->no_of_children >= 4)
            <tr>
                <td>Age of Child 1</td>
                <td>{{ $afdata->typable->children->child_4_age }}</td>
            </tr>
        @endif
        @if ($afdata->typable->children->no_of_children >= 5)
            <tr>
                <td>Age of Child 1</td>
                <td>{{ $afdata->typable->children->child_5_age }}</td>
            </tr>
        @endif
        @if ($afdata->typable->children->no_of_children >= 6)
            <tr>
                <td>Age of Child 1</td>
                <td>{{ $afdata->typable->children->child_6_age }}</td>
            </tr>
        @endif
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Education</td>
        </tr>
        <tr>
            <td>Highest level of education</td>
            <td>{{ $afdata->typable->education->highest_level }}</td>
        </tr>
        <tr>
            <td>Name of diploma</td>
            <td>{{ $afdata->typable->education->name_of_diploma }}</td>
        </tr>
        <tr>
            <td>Area of studies</td>
            <td>{{ $afdata->typable->education->aos }}</td>
        </tr>
        <tr>
            <td>Country of studies</td>
            <td>{{ $afdata->typable->education->cos }}</td>
        </tr>
        <tr>
            <td>Type of Educational Institute</td>
            <td>{{ $afdata->typable->education->toei }}</td>
        </tr>
        <tr>
            <td>Completed any post-secondary studies in Canada?</td>
            <td>{{ $afdata->typable->education->completed_post_sec }}</td>
        </tr>
        @if ($afdata->typable->education->completed_post_sec)
            <tr>
                <td>Post-secondary studies period</td>
                <td>{{ $afdata->typable->education->completed_post_sec }}</td>
            </tr>
        @endif
        <tr>
            <td>Name of bachelor's degree</td>
            <td>{{ $afdata->typable->education->name_of_bachelor_degree }}</td>
        </tr>
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Language</td>
        </tr>
        <tr>
            <td>Taken any English language test?</td>
            <td>{{ $afdata->typable->language->language_test }}</td>
        </tr>
        @if ($afdata->typable->language->language_test == 'IELTS')
            <tr>
                <td>English (IELTS Score)</td>
                <td>
                    <ul>
                        @foreach ($afdata->typable->language->ielts as $key => $value)
                            <li>{{ ucfirst($key) }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endif
        @if ($afdata->typable->language->language_test == 'CELPIP')
            <tr>
                <td>English (CELPIP)</td>
                <td>
                    <ul>
                        @foreach ($afdata->typable->language->celpip as $key => $value)
                            <li>{{ ucfirst($key) }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endif
        @if ($afdata->typable->language->language_test == 'No')
            <tr>
                <td>English (General Proficiency)</td>
                <td>
                    <ul>
                        @foreach ($afdata->typable->language->general as $key => $value)
                            <li>{{ ucfirst($key) }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endif
        <tr>
            <td>Done TEF (Test d'évaluation de français)?</td>
            <td>{{ $afdata->typable->language->done_tef }}</td>
        </tr>
        @if ($afdata->typable->language->done_tef === 'Yes')
            <tr>
                <td>French (TEF scores)</td>
                <td>
                    <ul>
                        @foreach ($afdata->typable->language->french_tef as $key => $value)
                            <li>{{ ucfirst($key) }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endif
        @if ($afdata->typable->language->done_tef === 'No')
            <tr>
                <td>French (General Proficiency)</td>
                <td>
                    <ul>
                        @foreach ($afdata->typable->language->general_french as $key => $value)
                            <li>{{ ucfirst($key) }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endif
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Work in Canada</td>
        </tr>
        <tr>
            <td>Been in Canada as a temporary foreign worker?</td>
            <td>{{ $afdata->typable->work->been_temp_foreign_worker }}</td>
        </tr>
        @if ($afdata->typable->work->been_temp_foreign_worker == 'Yes')
            <tr>
                <td>No. of years worked full-time in this position in Canada?</td>
                <td>{{ $afdata->typable->work->years_as_full_time }}</td>
            </tr>
            <tr>
                <td>Currently employed in Canada?</td>
                <td>{{ $afdata->typable->work->employed_in_canada }}</td>
            </tr>
            <tr>
                <td>When left employment in Canada?</td>
                <td>{{ $afdata->typable->work->when_left_job }}</td>
            </tr>
        @endif
        <tr>
            <td>Arranged employment?</td>
            <td>{{ $afdata->typable->work->arranged }}</td>
        </tr>
        @if ($afdata->typable->work->arranged == 'Yes')
            <tr>
                <td>NOC</td>
                <td>{{ $afdata->typable->work->noc }}</td>
            </tr>
        @endif
        <tr>
            <td>Have a certificate of qualification in a trade occupation issued by a province?</td>
            <td>{{ $afdata->typable->work->has_qualification_certificate }}</td>
        </tr>
        <tr>
            <td>Have a a nomination certificate from a Canadian province (except Quebec)?</td>
            <td>{{ $afdata->typable->work->has_nomination_certificate }}</td>
        </tr>
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Family Relations in Canada</td>
        </tr>
        <tr>
            <td>Do you or, if applicable your accompanying spouse, or common-law partner have a blood relative
                living in
                Canada who is a citizen or a permanent resident of Canada?</td>
            <td>{{ $afdata->typable->family->has_blood_relative }}</td>
        </tr>
        @if ($afdata->typable->family->has_blood_relative == 'Yes')
            <tr>
                <td>Their relationship with you</td>
                <td>{{ $afdata->typable->family->relationship }}</td>
            </tr>
            <tr>
                <td>Does this relative wish to sponsor you?</td>
                <td>{{ $afdata->typable->family->relative_wish_to_sponsor }}</td>
            </tr>
            @if ($afdata->typable->family->relative_wish_to_sponsor == 'Yes')
                @if ($afdata->typable->family->relationship == 'Mother or father')
                    <tr>
                        <td>Are you currently a full-time student?</td>
                        <td>{{ $afdata->typable->family->full_time_student }}</td>
                    </tr>
                @endif
                @if ($afdata->typable->family->relationship == 'Daughter or son' || $afdata->typable->family->relationship == 'Granddaughter or grandson')
                    <tr>
                        <td>How old is your relative?</td>
                        <td>{{ $afdata->typable->family->relative_age }}</td>
                    </tr>
                    <tr>
                        <td>What is the employment status of your relative?</td>
                        <td>{{ $afdata->typable->family->relative_employment_status }}</td>
                    </tr>
                    <tr>
                        <td>How many people is this relative financially responsible for in his/her household in
                            Canada?
                        </td>
                        <td>{{ $afdata->typable->family->people_relative_responsible }}</td>
                    </tr>
                    <tr>
                        <td>>How much is the annual household income of your relative? This includes the combined
                            annual
                            income of your relative and his/her spouse.</td>
                        <td>{{ $afdata->typable->family->relative_annual_income }} CDN</td>
                    </tr>
                @endif
            @endif
            <tr>
                <td>Have you been a full-time student and substantially dependent on your parents for financial
                    support
                    since before the age of 19?</td>
                <td>{{ $afdata->typable->family->dependant_financial }}</td>
            </tr>
        @endif
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Previous and the Future Visit(s)</td>
        </tr>
        <tr>
            <td>Have you or your spouse previously visited Canada for work, travel, or study?</td>
            <td>{{ $afdata->typable->previous->visited_canada }}</td>
        </tr>
        <tr>
            <td>Have you or your spouse previously applied for immigration or visa to Canada?</td>
            <td>{{ $afdata->typable->previous->applied_for_immigration }}</td>
        </tr>
        <tr>
            <td>Where is your preferred destination in Canada?</td>
            <td>{{ $afdata->typable->previous->preferred_destination }}</td>
        </tr>
        <tr>
            <td>Have you previously submitted an Express Entry application?</td>
            <td>{{ $afdata->typable->previous->submitted_express_entry }}</td>
        </tr>
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Occupation Details</td>
        </tr>
        @foreach ($afdata->typable->occupations as $index => $occupation)
            <tr>
                <td colspan="2" class="bg-gray-200 text-blue-900 font-bold">Occupation {{ $index + 1 }}</td>
            </tr>
            <tr>
                <td>Job Title</td>
                <td>{{ $occupation->job_title }}</td>
            </tr>
            <tr>
                <td>Duration</td>
                <td>{{ $occupation->duration }}</td>
            </tr>
            <tr>
                <td>Location</td>
                <td>{{ $occupation->location }}</td>
            </tr>
            <tr>
                <td>Presently worrking in this job?</td>
                <td>{{ $occupation->currently_working }}</td>
            </tr>
            <tr>
                <td>Is job qualified for social security (Applicable for Quebec destined applicants only)?</td>
                <td>{{ $occupation->qualified_for_social_security }}</td>
            </tr>
            <tr>
                <td>Type of employment</td>
                <td>{{ $occupation->type_of_employment }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="bg-gray-800 text-white">Business & Finances</td>
        </tr>
        <tr>
            <td>How much is your net worth?</td>
            <td>{{ $afdata->typable->finance->net_worth }}</td>
        </tr>
        @if ($afdata->typable->finance->getRawOriginal('net_worth') > 5)
            <tr>
                <td>Do you have experience managing a business?</td>
                <td>{{ $afdata->typable->finance->has_experience }}</td>
            </tr>
            @if ($afdata->typable->finance->has_experience == 'Yes')
                <tr>
                    <td>In the past 5 years, how many years of managerial experience do you have?</td>
                    <td>{{ $afdata->typable->finance->managerial_experience }}</td>
                </tr>
                <tr>
                    <td>Do you own this business</td>
                    <td>{{ $afdata->typable->finance->own_business }}</td>
                </tr>
                <tr>
                    <td>What is your percentage of ownership in this business?</td>
                    <td>{{ $afdata->typable->finance->percent_of_business ? $afdata->typable->finance->percent_of_business . '%' : '' }}
                    </td>
                </tr>
                <tr>
                    <td>What is the annual sales of this business?</td>
                    <td>{{ $afdata->typable->finance->annual_sale ? $afdata->typable->finance->annual_sale . ' CDN' : '' }}
                    </td>
                </tr>
                <tr>
                    <td>What is the net assets of this business?</td>
                    <td>{{ $afdata->typable->finance->net_assets ? $afdata->typable->finance->net_assets . ' CDN' : '' }}
                    </td>
                </tr>
            @endif
        @endif
    </table>
</div>
