<?php

namespace App\Helpers;

use App\Models\Breeder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\SvgWriter;

class QrCodeHelper
{
    public static function generateBreederQrCode(Breeder $breeder): string
    {
        $vcf = sprintf(
            "BEGIN:VCARD\r\nVERSION:3.0\r\nFN:%s\r\nN:%s;%s\r\nTEL:%s\r\nEMAIL:%s\r\nADR:;;%s;%s;%s;%s;BJ\r\nEND:VCARD",
            $breeder->full_name,
            $breeder->last_name,
            $breeder->first_name,
            $breeder->contact ?? '',
            $breeder->email ?? '',
            $breeder->neighborhood ?? '',
            $breeder->city ?? '',
            $breeder->borough ?? '',
            $breeder->geographic_location ?? ''
        );

        $qrCode = new QrCode(
            data: $vcf,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 0,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        $writer = new SvgWriter;
        $result = $writer->write($qrCode);

        return 'data:image/svg+xml;base64,'.base64_encode($result->getString());
    }
}
