<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body {
            width: 800px;
            margin: 0 auto;
            font-family: monospace;
        }
        .center {
            text-align: center;
        }
        span.filled {
            text-decoration: underline;
        }
        ol li {
            margin-top: 15px;
            /*margin-top: 1em;*/
            /*font-size: 1.3em;*/
            /*line-height: 1.5em;*/
        }
        ol.letters {
            list-style: upper-alpha;
        }
    </style>

    <title>Document</title>
</head>
<body>

<div class="center">
    <h1>Residential Lease Agreement</h1>
    <h3>{{ $rental->addressHeader() }}<br>{{ $rental->addressFooter() }}</h3>
</div>
<div>
    <ol>
        <li>
            PARTIES: This lease is made on <span class="filled">{{ $tenancy->signed_at->format('M jS') }}, {{ $tenancy->signed_at->format('Y') }}</span>
            between the LANDLORD: <span class="filled">{{ $rental->landlord->fullName() }}</span>, address: <span class="filled">LANDLORD_ADDR</span>
            and the TENANTS: <span class="filled">{{ $tenancy->tenant->fullName() }}</span>
        </li>
        <li>
            PROPERTY: The landlord agrees to rent to the tenant the property described as:
            <span class="filled">{{ $rental->addressHeader() }}</span> located in <span class="filled">{{ $rental->addressFooter() }}</span>
        </li>
        <li>
            CONDITIONS:
            <ol class="letters">
                <li>
                    The rent for the property is $<span class="filled">{{ $tenancy->rent_monthly }}</span> per month The tenant must pay the rent on
                    the ________ day of the month and deliver it to the LANDLORD at the above address
                </li>
                <li>
                    If the tenant fails to pay the rent on the due date, the LANDLORD may end this lease If
                    the rent is more than ________days late, the tenant must pay a late fee of $___________
                    and then another $__________ for each additional day that the rent is late The late fees
                    specified are reasonable estimations of the losses the landlord will suffer as a result of
                    late payment of rent
                </li>
                <li>
                    The term of this lease is ______________ beginning on <span class="filled">{{ $tenancy->start_at->format('M jS') }}, {{ $tenancy->start_at->format('Y') }}</span> The total rent
                    due for the full term of this lease is $<span class="filled">{{ $tenancy->rent_monthly * 12 }}</span> In the event that the tenant should
                    break this lease without the written permission of the LANDLORD, the unpaid rent for
                    the remainder of this lease will become immediately due and owing to the LANDLORD
                </li>
                <li>
                    When the lease’s term ends, it will automatically renew for a term of _____________ If the
                    landlord or tenant does not want to renew the lease, he must give the other _________
                    days written notice before the end of the term
                </li>
                <li>
                    The tenant has checked the property and agrees that it is in clean and good condition At
                    the end of this lease, the tenant will return the property to the LANDLORD in the same
                    clean and good condition
                </li>
                <li>
                    The tenant will only use the property for residential purposes
                </li>
                <li>
                    The tenant’s promise to pay the rent is separate from all other promises in this lease
                    The tenant agrees to pay the full rent each month If the LANDLORD owes the tenant
                    any money, the tenant agrees not to deduct it from the rent due or from any other money
                    owed to the LANDLORD
                </li>
                <li>
                    SECURITY DEPOSIT:
                    <ol>
                        <li>
                            The amount of the security deposit is $<span class="filled">{{ $tenancy->rent_deposit }}</span>
                        </li>
                        <li>
                            The LANDLORD cannot require the tenant to pay a security deposit that is more
                            than (2) two months rent After the first year, the landlord must reduce the security
                            deposit to no more than one month’s rent
                        </li>
                        <li>
                            The tenant cannot use the security deposit to pay rent without the written approval
                            of the landlord
                        </li>
                        <li>
                            The LANDLORD can use the security deposit for unpaid rent and damages that are
                            the tenant’s responsibility beyond normal wear and tear
                        </li>
                        <li>
                            When the tenant moves out, the LANDLORD will prepare a list of charges for
                            damages and any unpaid rent The LANDLORD can deduct these charges, if any,
                            from the security deposit and will return the balance within (30) thirty days The
                            tenant must give the LANDLORD written notice of the tenant’s new address or
                            make other arrangements with the LANDLORD for the return of the security
                            deposit
                        </li>
                    </ol>
                </li>
                <li>
                    UTILITIES:
                    Tenant agrees to pay all utilities and/or services based upon occupancy of the premises
                    except_________________________________________________________________________
                </li>
                <li>
                    OCCUPANTS:
                    Guest(s) staying over more than ____days without the written consent of the LANDLORD shall
                    be considered a breach of this agreement ONLY the following individuals and/or animals,
                    AND NO OTHERS shall occupy the subject residence for more than ____ days unless the
                    expressed written consent of the LANDLORD is obtained ____ days in advance:
                    __________________________________________________________________________
                    ___________________________________________________________________________________
                </li>
                <li>
                    LIQUID FILLED FURNISHINGS:
                    No liquid filled furniture, receptacle containing more than ten gallons of liquid is permitted
                    without prior written consent and meeting the requirements of the LANDLORD Tenant also
                    agrees to carry insurance deemed appropriate by LANDLORD to cover possible losses that
                    may be caused by such items
                </li>
                <li>
                    INSURANCE:
                    Tenant acknowledges that LANDLORD’S insurance does not cover personal property damage
                    caused by fire, theft, rain, war, acts of God, acts of others, and/or any other causes, nor shall
                    LANDLORD be held liable for such losses Tenant is hereby advised to obtain his own
                    insurance policy to cover any personal loses
                </li>
                <li>
                    REPAIRS:
                    The tenant will notify the LANDLORD promptly if any part of the property is damaged or
                    destroyed The tenant is responsible for any damage or destruction done to the property by
                    his actions or negligence, or by the actions or negligence of his family or guests The tenant
                    must make all repairs and replacements to fix such damage or destruction If the tenant fails
                    to do so, the LANDLORD may do it and add the expense to the next month’s rent
                </li>
                <li>
                    LANDLORDS ENTRY ONTO PROPERTY:
                    The LANDLORD can enter the property at reasonable times on (24) twenty-four hours notice
                    to the tenant The LANDLORD can enter the property to inspect it; make repairs, alterations
                    or improvements; supply services; or, show the property to prospective buyers, lenders,
                    contractors, insurers, or tenants In case of emergency, the LANDLORD can enter the
                    property at any time without notice to the tenant
                </li>
                <li>
                    TENANT RESPONSIBILITIES:
                    All tenants and other people the tenant allows on the property promise to:
                    A)    Obey all local, state and federal laws
                    B) Keep the property clean and safe
                    C) Use all utilities, facilities and fixtures in a safe and reasonable way
                    D) Promptly remove all trash and debris from the property as required by the landlord and
                    local ordinance
                    E)    Not deliberately or negligently destroy, deface, damage, or remove any part of the
                    property or grounds
                    F)    Not unreasonably disturb the peace of the landlord, other tenants or neighbors
                    G) Promptly notify the LANDLORD of conditions that need repair
                    H) Make no major changes to the property, such as painting, rebuilding, removing,
                    repairing or improving without the LANDLORD’S written consent Alterations become
                    the property of the LANDLORD The tenant cannot remove improvements and the
                    landlord does not have to pay for any changes or improvements made by the tenant
                    I)       Agree not to install any external antennae, which shall include but not be limited to
                    antenna for television, CB radio, FM reception, short-wave radio & satellite dish without
                    prior written consent of landlord
                    J)        Not to bring or keep any pets on the property without the prior written approval by the
                    LANDLORD
                    K)       Allow the LANDLORD to put up “for sale,” “for rent,” or other signs
                    L)       Move out of the property when the lease ends
                    M)       Keep nothing on the property that is highly flammable, dangerous or substantially
                    increases the danger of fire or injury
                </li>
                <li>
                    LANDLORD RESPONSIBILITIES:
                    The LANDLORD promises to:
                    A)   Maintain the property and common areas in the manner required by law
                    B) Keep the property in good repair and good working order
                    C) Continue all services and utilities that the landlord has agreed to provide
                    D) Allow the tenant to enjoy the property without interference so long as the tenant obeys
                    all the rules in this lease
                </li>
                <li>
                    LANDLORD RIGHTS:
                    A)  The tenant waives the Notice To Quit otherwise required by law This means that the
                    LANDLORD may require the tenant vacate and surrender the apartment immediately
                    with no prior notice
                    B) If the tenant fails to pay any one-month’s rent on or before the due date, or the tenant
                    breaks any other provision in this lease, the LANDLORD may end this lease immediately
                    and file a lawsuit to evict the tenant
                    C) Besides ending this lease and evicting the tenant, the landlord can sue the tenant for
                    unpaid rent, other damages, losses or injuries If the LANDLORD gets a judgment for
                    money against the tenant, the landlord can use the court process to take your personal
                    goods, furniture, motor vehicles and money in banks The LANDLORD may also be able
                    to attach your wages to recover money for damages done to the property
                    D) The LANDLORD may recover reasonable legal fees and costs from the tenant for any
                    legal actions relating to the payment of rent or the recovery of the property
                </li>
                <li>
                    ABANDONMENT:
                    The property will be considered abandoned by the tenant if:
                    A)   The tenant gives the LANDLORD notice that he will not return to the property;
                    B) The tenant removes his personal belongings from the property, fails to pay the rent, and
                    does not return for (15) fifteen days;
                    C) The tenant fails to pay the rent and does not return to the property for one month; or
                    D) The tenant leaves personal belongings in the property after the end of the lease
                    *If the tenant abandons the property, the LANDLORD may enter and relet the property
                    In this case, the LANDLORD may also remove and dispose of any personal property left
                    behind by the tenant

                </li>
                <li>
                    TENANT TRANSFER OF LEASE:
                    The tenant cannot lease the property to any other person or let any other person take over
                    the tenant’s rights and duties under this lease, unless the landlord first gives written
                    approval

                </li>
                <li>
                    PRIORITY OF LEASE & SALE OF PROPERTY:
                    If the LANDLORD sells this property, the purchaser can end this lease All mortgages that
                    now or in the future affect the property have a priority over this lease
                    If the landlord sells the property, he will give the tenant written notice stating the name,
                    address and phone number of the new landlord and where and to whom to pay rent The
                    landlord must also inform the tenant whether the security deposit was transferred to the new
                    landlord If the landlord does not transfer the security deposit, the landlord must return it to
                    the tenant as described in this lease
                </li>
                <li>
                    REPORT TO CREDIT/TENANT AGENCIES:
                    You are hereby notified that a nonpayment, late payment or breach of any of the terms of this
                    rental agreement may be submitted/reported to a credit and/or tenant reporting agency, and
                    may create a negative credit record on your credit report
                </li>
                <li>
                    LEAD NOTIFICATION REQUIREMENT:
                    For rental dwellings built before 1978, Tenant acknowledges receipt of the following: (Please
                    Initial)
                    ____     Lead Based Paint Disclosure Form
                    ____     EPA Pamphlet
                </li>
                <li>
                    NOTICES:
                    All notices to TENANT shall be served at Tenant’s premises and all notices to LANDLORD
                    shall be served at: _______________________________________________________
                </li>
                <li>
                    AGREEMENT:
                    This lease contains the complete agreement between the LANDLORD and the TENANT The
                    landlord and tenant can change this lease only by a written agreement signed by both If
                    more than one tenant signs this lease, each tenant assumes full liability for all the obligations
                    in this lease NO ORAL AGRREMENTS HAVE BEEN ENTERED INTO ALL modifications or
                    notices shall be in writing in order to be valid
                    * Each part of this lease should be interpreted so that it agrees with current law If the law
                    does not allow a certain part of this lease, then that one part will be ineffective without
                    invalidating the rest of the section or the rest of this lease
                </li>
                <li>
                    ADDITIONAL TERMS & CONDITIONS:

                    _______________________________________________________________________________________
                    _______________________________________________________________________________________
                    _______________________________________________________________________________________
                    _______________________________________________________________________________________
                    _______________________________________________________________________________________
                </li>
            </ol>
        </li>
    </ol>
    <div class="signatures">
        <div class="left">


            ____________________________________                 ______________________________________
            LANDLORD OR AGENT                                    TENANT

a
            ____________________________________                 ______________________________________
            DATE                                                 TENANT


        </div>
        <div class="right">

        </div>
    </div>
</div>
</body>
</html>
