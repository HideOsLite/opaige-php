<?php
// Generated from the Opaige API description, https://opaige.com/api/company/v1/openapi.json (version 2026-11-01). Do not edit by hand.

declare(strict_types=1);

namespace Opaige;

abstract class Operations
{
    abstract protected function http(): Requester;

    /** A day’s appointments with the file state and the counter stage. GET /appointments */
    public function listAppointments(string|int|null $date = null): mixed
    {
        return $this->http()->request('GET', '/appointments', ['date' => $date], null, null, null, []);
    }

    /** Appointments, from a visa centre’s booking system. POST /appointments */
    public function sendAppointments(array $body): mixed
    {
        return $this->http()->request('POST', '/appointments', [], $body, null, null, []);
    }

    /** Your bookings with every nudge sent or due. GET /bookings */
    public function listBookings(string|int|null $updatedSince = null): mixed
    {
        return $this->http()->request('GET', '/bookings', ['updated_since' => $updatedSince], null, null, null, []);
    }

    /** Bookings, from an airline’s or travel platform’s reservation system: who needs a visa or travel permission, and when each passenger is nudged. POST /bookings */
    public function sendBookings(array $body): mixed
    {
        return $this->http()->request('POST', '/bookings', [], $body, null, null, []);
    }

    /** One booking by your reference. GET /bookings/{ref} */
    public function getBooking(string $ref): mixed
    {
        return $this->http()->request('GET', '/bookings/' . rawurlencode($ref), [], null, null, null, []);
    }

    /** A case’s finished file, with fresh links. GET /cases/{id}/file */
    public function getCaseFile(string $id): mixed
    {
        return $this->http()->request('GET', '/cases/' . rawurlencode($id) . '/file', [], null, null, null, []);
    }

    /** Send file.ready again. POST /cases/{id}/file */
    public function resendCaseFile(string $id): mixed
    {
        return $this->http()->request('POST', '/cases/' . rawurlencode($id) . '/file', [], null, null, null, []);
    }

    /** An itinerary, cover letter, submission brief or third-party letter. POST /documents */
    public function makeDocument(array $body, string|int|null $format = null): mixed
    {
        return $this->http()->request('POST', '/documents', ['format' => $format], $body, null, null, []);
    }

    /** Every inconsistency in a whole visa file. POST /file-review */
    public function reviewFile(?array $body = null, ?string $file = null, string $filename = 'file.pdf', array $fields = [], ?string $idempotencyKey = null): mixed
    {
        return $this->http()->request('POST', '/file-review', [], $body, $file, $filename, $fields, $idempotencyKey);
    }

    /** A review made earlier. GET /file-review/{id} */
    public function getFileReview(string $id): mixed
    {
        return $this->http()->request('GET', '/file-review/' . rawurlencode($id), [], null, null, null, []);
    }

    /** A place to PUT a large PDF before reviewing it. POST /file-review/uploads */
    public function createUpload(): mixed
    {
        return $this->http()->request('POST', '/file-review/uploads', [], null, null, null, []);
    }

    /** Every file that became ready since a moment: the daily batch. GET /files */
    public function listReadyFiles(string|int|null $since = null): mixed
    {
        return $this->http()->request('GET', '/files', ['since' => $since], null, null, null, []);
    }

    /** The official visa form, filled from answers. POST /forms */
    public function fillForm(array $body, string|int|null $format = null): mixed
    {
        return $this->http()->request('POST', '/forms', ['format' => $format], $body, null, null, []);
    }

    /** Every case billed, due or paid. GET /invoices */
    public function listInvoices(string|int|null $status = null, string|int|null $from = null, string|int|null $to = null): mixed
    {
        return $this->http()->request('GET', '/invoices', ['status' => $status, 'from' => $from, 'to' => $to], null, null, null, []);
    }

    /** Your lodgements, newest first. GET /lodgements */
    public function listLodgements(): mixed
    {
        return $this->http()->request('GET', '/lodgements', [], null, null, null, []);
    }

    /** Fill a visa application on the government portal, parked before the declarations (au-600) or the photo and signature (us-ds160). POST /lodgements */
    public function createLodgement(array $body, ?string $idempotencyKey = null): mixed
    {
        return $this->http()->request('POST', '/lodgements', [], $body, null, null, [], $idempotencyKey);
    }

    /** Where a lodgement stands, with the government reference once there is one. GET /lodgements/{id} */
    public function getLodgement(string $id): mixed
    {
        return $this->http()->request('GET', '/lodgements/' . rawurlencode($id), [], null, null, null, []);
    }

    /** Attach supporting documents. POST /lodgements/{id}/documents */
    public function attachLodgementDocuments(string $id, array $body): mixed
    {
        return $this->http()->request('POST', '/lodgements/' . rawurlencode($id) . '/documents', [], $body, null, null, []);
    }

    /** Lodge and pay the government fee (requires authorize: true). POST /lodgements/{id}/submit */
    public function submitLodgement(string $id, array $body, ?string $idempotencyKey = null): mixed
    {
        return $this->http()->request('POST', '/lodgements/' . rawurlencode($id) . '/submit', [], $body, null, null, [], $idempotencyKey);
    }

    /** The questions a DS-160 lodgement answers, as a case asks them. GET /lodgements/questions */
    public function lodgementQuestions(string|int|null $visa = null, string|int|null $purpose = null): mixed
    {
        return $this->http()->request('GET', '/lodgements/questions', ['visa' => $visa, 'purpose' => $purpose], null, null, null, []);
    }

    /** Who on a flight needs a visa, and by when to file. POST /passengers/check */
    public function checkPassengers(array $body): mixed
    {
        return $this->http()->request('POST', '/passengers/check', [], $body, null, null, []);
    }

    /** Give a passenger their visa file (billed per file). POST /passengers/file */
    public function givePassengerFile(array $body, ?string $idempotencyKey = null): mixed
    {
        return $this->http()->request('POST', '/passengers/file', [], $body, null, null, [], $idempotencyKey);
    }

    /** Your page for buying the file, and where passengers get help. GET /passengers/settings */
    public function getPassengerSettings(): mixed
    {
        return $this->http()->request('GET', '/passengers/settings', [], null, null, null, []);
    }

    /** Change them (null clears). PATCH /passengers/settings */
    public function updatePassengerSettings(array $body): mixed
    {
        return $this->http()->request('PATCH', '/passengers/settings', [], $body, null, null, []);
    }

    /** Stages of passengers who chose to share. GET /passengers/status */
    public function passengerStatus(string|int|null $ref = null): mixed
    {
        return $this->http()->request('GET', '/passengers/status', ['ref' => $ref], null, null, null, []);
    }

    /** What a passport needs for a destination. GET /requirements */
    public function checkRequirements(string|int|null $passport = null, string|int|null $destination = null, string|int|null $residence = null, string|int|null $stayDays = null): mixed
    {
        return $this->http()->request('GET', '/requirements', ['passport' => $passport, 'destination' => $destination, 'residence' => $residence, 'stay_days' => $stayDays], null, null, null, []);
    }

    /** Who takes the application, where, and who decides it. GET /routes */
    public function whereToApply(string|int|null $residence = null, string|int|null $destination = null): mixed
    {
        return $this->http()->request('GET', '/routes', ['residence' => $residence, 'destination' => $destination], null, null, null, []);
    }

    /** Every destination the rules cover, with versions. GET /rules */
    public function listRules(): mixed
    {
        return $this->http()->request('GET', '/rules', [], null, null, null, []);
    }

    /** One destination: every passport grouped by what it needs, with sources. GET /rules/{destination} */
    public function getRules(string $destination): mixed
    {
        return $this->http()->request('GET', '/rules/' . rawurlencode($destination), [], null, null, null, []);
    }

    /** Rule changes announced, in force or coming up. GET /rules/notices */
    public function listRuleNotices(string|int|null $since = null): mixed
    {
        return $this->http()->request('GET', '/rules/notices', ['since' => $since], null, null, null, []);
    }

    /** Admitted students, with the visa stage where each agreed to share it. GET /students */
    public function listStudents(): mixed
    {
        return $this->http()->request('GET', '/students', [], null, null, null, []);
    }

    /** Admitted students, from a school’s admissions system; each gets a visa link. POST /students */
    public function sendStudents(array $body): mixed
    {
        return $this->http()->request('POST', '/students', [], $body, null, null, []);
    }

    /** A UK sponsor’s refusal, enrolment and completion rates as the Basic Compliance Assessment works them. GET /students/compliance */
    public function sponsorCompliance(string|int|null $asOf = null): mixed
    {
        return $this->http()->request('GET', '/students/compliance', ['as_of' => $asOf], null, null, null, []);
    }

    /** Pre-CAS: a UK Student’s money against the Immigration Rules, each finding with its paragraph. POST /students/funds-check */
    public function studentFundsCheck(array $body): mixed
    {
        return $this->http()->request('POST', '/students/funds-check', [], $body, null, null, []);
    }

    /** Trips and where each case stands. GET /trips */
    public function listTrips(string|int|null $status = null, string|int|null $updatedSince = null): mixed
    {
        return $this->http()->request('GET', '/trips', ['status' => $status, 'updated_since' => $updatedSince], null, null, null, []);
    }

    /** Plan a trip; it follows your approval rules. POST /trips */
    public function createTrip(array $body): mixed
    {
        return $this->http()->request('POST', '/trips', [], $body, null, null, []);
    }

    /** One trip, with its case. GET /trips/{id} */
    public function getTrip(string $id): mixed
    {
        return $this->http()->request('GET', '/trips/' . rawurlencode($id), [], null, null, null, []);
    }

    /** A month’s measured uptime against the 99.9% commitment. GET /uptime */
    public function getUptime(string|int|null $month = null): mixed
    {
        return $this->http()->request('GET', '/uptime', ['month' => $month], null, null, null, []);
    }

    /** This month’s paid API use and what it comes to. GET /usage */
    public function getUsage(string|int|null $month = null): mixed
    {
        return $this->http()->request('GET', '/usage', ['month' => $month], null, null, null, []);
    }

}
