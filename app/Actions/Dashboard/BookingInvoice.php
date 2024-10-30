<?php

namespace App\Actions\Dashboard;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BookingInvoice
{
    /**
     * Generate and download a booking invoice as PDF.
     *
     * @param Booking $booking
     * @return StreamedResponse
     */
    public static function download(Booking $booking): StreamedResponse
    {
        $pdf = self::generatePdf($booking);
        $filename = self::generateFilename($booking);

        return response()->streamDownload(
            function () use ($pdf, $filename) {
                echo $pdf->stream();
            }, $filename
        );
    }

    /**
     * Generate the PDF for the booking invoice.
     *
     * @param Booking $booking
     * @return \Barryvdh\DomPDF\PDF
     */
    private static function generatePdf(Booking $booking): \Barryvdh\DomPDF\PDF
    {
        return Pdf::loadView('dashboard.bookings.invoice', compact('booking'))
            ->setPaper('a4')
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
    }

    /**
     * Generate the filename for the booking invoice.
     *
     * @param Booking $booking
     * @return string
     */
    private static function generateFilename(Booking $booking): string
    {
        return "invoice-{$booking->code}.pdf";
    }
}
