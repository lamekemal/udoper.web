<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pièce d'Identité - {{ $breeder->full_name }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f5f5; }
        
        .identity-card {
            width: 85.6mm;
            height: 153.98mm;
            background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
            border: 2px solid #333;
            margin: 20px auto;
            padding: 10mm;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            page-break-after: always;
        }
        
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 4mm;
            margin-bottom: 6mm;
        }
        
        .header-title {
            font-size: 10px;
            font-weight: bold;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .header-org {
            font-size: 8px;
            color: #555;
            margin-top: 2px;
        }
        
        .main-content {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 6mm;
        }
        
        .photos-section {
            display: table-cell;
            width: 30%;
            vertical-align: top;
            padding-right: 4mm;
        }
        
        .info-section {
            display: table-cell;
            width: 70%;
            vertical-align: top;
        }
        
        .photo-container {
            text-align: center;
            margin-bottom: 4mm;
        }
        
        .photo-label {
            font-size: 6px;
            font-weight: bold;
            margin-bottom: 2mm;
            color: #333;
        }
        
        .id-photo {
            width: 20mm;
            height: 25mm;
            background: #e0e0e0;
            border: 1px solid #999;
            object-fit: cover;
            margin: 0 auto;
        }
        
        .signature-photo {
            width: 20mm;
            height: 12mm;
            background: #e0e0e0;
            border: 1px solid #999;
            object-fit: cover;
            margin: 0 auto;
        }
        
        .info-row {
            font-size: 7px;
            margin-bottom: 3mm;
            display: flex;
            line-height: 1.2;
        }
        
        .info-label {
            font-weight: bold;
            min-width: 35mm;
            color: #333;
        }
        
        .info-value {
            flex: 1;
            color: #000;
            word-wrap: break-word;
        }
        
        .dates-section {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-top: 1px solid #ccc;
            padding-top: 3mm;
            margin-top: 3mm;
        }
        
        .date-item {
            display: table-cell;
            text-align: center;
            font-size: 7px;
            width: 50%;
            padding: 0 2mm;
        }
        
        .date-label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 1mm;
        }
        
        .date-value {
            font-size: 8px;
            color: #000;
            font-weight: bold;
        }
        
        .footer {
            text-align: center;
            font-size: 6px;
            color: #666;
            margin-top: 4mm;
            border-top: 1px solid #ccc;
            padding-top: 2mm;
        }
    </style>
</head>
<body>
    <div class="identity-card">
        <!-- Header -->
        <div class="header">
            <div class="header-title">PIÈCE D'IDENTITÉ</div>
            <div class="header-org">Coopérative UDOPER-AD</div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Photos Section -->
            <div class="photos-section">
                @if($breeder->id_photo)
                    <div class="photo-container">
                        <div class="photo-label">Photo</div>
                        <img src="{{ public_path('storage/' . $breeder->id_photo) }}" alt="Photo" class="id-photo">
                    </div>
                @else
                    <div class="photo-container">
                        <div class="photo-label">Photo</div>
                        <div class="id-photo"></div>
                    </div>
                @endif
                
                @if($breeder->signature_photo)
                    <div class="photo-container">
                        <div class="photo-label">Signature</div>
                        <img src="{{ public_path('storage/' . $breeder->signature_photo) }}" alt="Signature" class="signature-photo">
                    </div>
                @else
                    <div class="photo-container">
                        <div class="photo-label">Signature</div>
                        <div class="signature-photo"></div>
                    </div>
                @endif
            </div>
            
            <!-- Info Section -->
            <div class="info-section">
                <div class="info-row">
                    <span class="info-label">Nom Complet:</span>
                    <span class="info-value">{{ $breeder->full_name }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">N° Éleveur:</span>
                    <span class="info-value">{{ $breeder->breeder_number }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Date Naissance:</span>
                    <span class="info-value">{{ $breeder->date_of_birth ? \Carbon\Carbon::parse($breeder->date_of_birth)->format('d/m/Y') : '—' }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Lieu Naissance:</span>
                    <span class="info-value">{{ $breeder->place_of_birth ?? '—' }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Contact:</span>
                    <span class="info-value">{{ $breeder->contact ?? '—' }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $breeder->email ?? '—' }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Adresse:</span>
                    <span class="info-value">{{ $breeder->neighborhood }}, {{ $breeder->borough }}, {{ $breeder->city }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Organisation:</span>
                    <span class="info-value">{{ $breeder->organization ?? '—' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Dates Section -->
        <div class="dates-section">
            <div class="date-item">
                <span class="date-label">Délivrance</span>
                <span class="date-value">{{ $breeder->id_issued_date ? \Carbon\Carbon::parse($breeder->id_issued_date)->format('d/m/Y') : '—' }}</span>
            </div>
            <div class="date-item">
                <span class="date-label">Expiration</span>
                <span class="date-value">{{ $breeder->id_expiration_date ? \Carbon\Carbon::parse($breeder->id_expiration_date)->format('d/m/Y') : '—' }}</span>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            Valide du {{ $breeder->id_issued_date ? \Carbon\Carbon::parse($breeder->id_issued_date)->format('d/m/Y') : '—' }} au {{ $breeder->id_expiration_date ? \Carbon\Carbon::parse($breeder->id_expiration_date)->format('d/m/Y') : '—' }}
        </div>
    </div>
</body>
</html>