<tr>
    <td>Fullname</td>
    <td>{{ $afdata->typable->fullname }}</td>
</tr>
<tr>
    <td>E-mail</td>
    <td>{{ $afdata->typable->email }}</td>
</tr>
<tr>
    <td>Phone</td>
    <td>{{ $afdata->typable->phone }}</td>
</tr>
<tr>
    <td>Country</td>
    <td>{{ Str::title(str_replace('_', ' ', $afdata->typable->country)) }}</td>
</tr>
<tr>
    <td>Nationality</td>
    <td>{{ $afdata->typable->nationality }}</td>
</tr>
<tr>
    <td>Reference</td>
    <td>{{ $afdata->typable->reference }}</td>
</tr>
<tr>
    <td>Currently in canada?</td>
    <td>{{ ucfirst($afdata->typable->nationality) }}</td>
</tr>
<tr>
    <td>Experience</td>
    <td>{{ Str::title(str_replace('_', ' ', $afdata->typable->experience)) }}</td>
</tr>
<tr>
    <td>Area of business or management experience acquired in the past 10 years</td>
    <td>{{ implode(',', $afdata->typable->aoi) }}</td>
</tr>
<tr>
    <td>Brief description of product/commodity you deal in your
        business</td>
    <td>{{ $afdata->typable->describe }}</td>
</tr>
<tr>
    <td>Educational Qualification</td>
    <td>{{ $afdata->typable->qualification }}</td>
</tr>
<tr>
    <td>Date of Birth</td>
    <td>{{ \Carbon\Carbon::parse($afdata->dob)->toFormattedDateString() }}</td>
</tr>
<tr>
    <td>Marital Statusn</td>
    <td>{{ Str::title(str_replace('_', ' ', $afdata->typable->marital_status)) }}</td>
</tr>
@if ($afdata->typable->marital_status == 'married')
    <tr>
        <td>Spouse's Date of Birth</td>
        <td>{{ \Carbon\Carbon::parse($afdata->spouse_dob)->toFormattedDateString() }}</td>
    </tr>
    <tr>
        <td>Spouse's Experience</td>
        <td>{{ $afdata->typable->spouse_experience }}</td>
    </tr>
@endif
@if ($afdata->typable->marital_status == 'married' || $afdata->typable->marital_status == 'divorced' || $afdata->typable->marital_status == 'legally_seperated')
    <tr>
        <td>No. of children</td>
        <td>{{ $afdata->typable->no_of_children }}</td>
    </tr>
    <tr>
        <td>Have children less than 22 years of age?</td>
        <td>{{ ucfirst($afdata->typable->has_children_lt_22) }}</td>
    </tr>
    <tr>
        <td>Have children enrolled in accredited
            Canadian education institution/s and are actively pursuing academic, professional or vocational
            training on a full-time basis?</td>
        <td>{{ ucfirst($afdata->typable->children_enrolled) }}</td>
    </tr>
    <tr>
        <td>Have any of your children who are
            Canadian
            citizens or permanent residents of Canada?</td>
        <td>{{ ucfirst($afdata->typable->children_canadian) }}</td>
    </tr>
    <tr>
        <td>Do you, your spouse or your children have a
            physical or mental disorder that requires medical attention?</td>
        <td>{{ ucfirst($afdata->typable->children_mental) }}</td>
    </tr>
@endif
<tr>
    <td>Have you been ordered to leave Canada or any other
        country?</td>
    <td>{{ ucfirst($afdata->typable->ordered_to_leave) }}</td>
</tr>
<tr>
    <td>Have you ever committed, been arrested for, or been
        charged with any offense in any country, including driving under the influence of alcohol or
        drugs?</td>
    <td>{{ ucfirst($afdata->typable->arrested) }}</td>
</tr>
<tr>
    <td>Have you ever been in the military (including
        mandatory
        service), a militia, or a civil defense unit or the police?</td>
    <td>{{ ucfirst($afdata->typable->been_military) }}</td>
</tr>
<tr>
    <td>Have you ever been employed by a government in a
        security-related capacity?</td>
    <td>{{ ucfirst($afdata->typable->employed_security) }}</td>
</tr>
<tr>
    <td>Have you visited other countries within the last 10
        years?</td>
    <td>{{ ucfirst($afdata->typable->visited) }}</td>
</tr>
@if ($afdata->typable->visited == 'yes')
    <tr>
        <td>Visited countries in last 10 years</td>
        <td>{{ $afdata->typable->visited_countries }}</td>
    </tr>
@endif
<tr>
    <td>Do you or your spouse have blood relatives in
        Canada?</td>
    <td>{{ ucfirst($afdata->typable->has_blood_relative) }}</td>
</tr>
@if ($afdata->typable->has_blood_relative == 'yes')
    <tr>
        <td>Province(s) they reside in</td>
        <td>{{ $afdata->typable->relative_province }}</td>
    </tr>
@endif
<tr>
    <td>Ever visited Canada ?</td>
    <td>{{ ucfirst($afdata->typable->visited_canada) }}</td>
</tr>
@if ($afdata->typable->visited_canada == 'yes')
    <tr>
        <td>Visited Canada in the last 2 years?</td>
        <td>{{ ucfirst($afdata->typable->visited_in_2) }}</td>
    </tr>
    @if ($afdata->typable->visited_in_2 == 'yes')
        <tr>
            <td>Visited province(s)</td>
            <td>{{ ucfirst($afdata->typable->visited_province) }}</td>
        </tr>
    @endif
@endif
<tr>
    <td>Has visa to Canada ever been refused?</td>
    <td>{{ ucfirst($afdata->typable->refused) }}</td>
</tr>
@if ($afdata->typable->refused == 'yes')
    <tr>
        <td>Details of refusal</td>
        <td>{{ $afdata->typable->refused_detail }}</td>
    </tr>
@endif
<tr>
    <td>Total value of assets</td>
    <td>{{ $afdata->typable->assets }}</td>
</tr>
<tr>
    <td>Have you taken English proficiency test (IELTS or CELPIP) ?</td>
    <td>{{ ucfirst($afdata->typable->language_test) }}</td>
</tr>
@if ($afdata->typable->language_test == 'yes')
    <tr>
        <td>Reading Score</td>
        <td>{{ $afdata->typable->read_score }}</td>
    </tr>
    <tr>
        <td>Speaking Score</td>
        <td>{{ $afdata->typable->speak_score }}</td>
    </tr>
    <tr>
        <td>Writing Score</td>
        <td>{{ $afdata->typable->write_score }}</td>
    </tr>
    <tr>
        <td>Listening Score</td>
        <td>{{ $afdata->typable->listen_score }}</td>
    </tr>
@endif
@if ($afdata->typable->language_test == 'no')
    <tr>
        <td>how do you rate your English language proficiency?</td>
        <td>{{ $afdata->typable->language_proficiency }}</td>
    </tr>
@endif
<tr>
    <td>Comments</td>
    <td>{{ ucfirst($afdata->typable->comments) }}</td>
</tr>
<tr>
    <td>I am interested in the following
        Canada's
        business
        immigration / business work permit programs</td>
    <td>
        <ul>
            @foreach ($afdata->typable->interested_programs as $it)
                <li>{{ $it }}</li>
            @endforeach
        </ul>
    </td>
</tr>
<tr>
    <td>Prefer to settle</td>
    <td>{{ Str::title(str_replace('_', ' ', $afdata->typable->prefered_location)) }}</td>
</tr>
