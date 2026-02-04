<?php
/**
 * PROXY GOOGLE REVIEWS - Dépannage PC Gard
 * Version CORRIGÉE - Janvier 2026
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=3600');

// ============================================
// CONFIGURATION - VALEURS CORRIGÉES
// ============================================
$API_KEY = 'AIzaSyBE00MS9MOfQnnupzo7WrgUTiINXokW6gI';

// ✅ BON Place ID (extrait de ton URL Google Maps)
$PLACE_ID = 'ChIJw_UBCpRYvK13vDSMJfoE6A';

// ✅ BON CID : 16718762755879124087
$CID = '16718762755879124087';

// ============================================
// CACHE (1 heure)
// ============================================
$CACHE_FILE = __DIR__ . '/google-reviews-cache.json';
$CACHE_DURATION = 3600;

// Paramètre pour forcer le refresh du cache
if (isset($_GET['refresh'])) {
    if (file_exists($CACHE_FILE)) {
        unlink($CACHE_FILE);
    }
}

// Vérifier le cache
if (file_exists($CACHE_FILE)) {
    $cacheTime = filemtime($CACHE_FILE);
    if (time() - $cacheTime < $CACHE_DURATION) {
        echo file_get_contents($CACHE_FILE);
        exit;
    }
}

// ============================================
// RÉCUPÉRER LES DÉTAILS + AVIS VIA API
// ============================================
$detailsUrl = "https://maps.googleapis.com/maps/api/place/details/json?"
    . "place_id={$PLACE_ID}"
    . "&fields=name,rating,user_ratings_total,reviews,url,formatted_address"
    . "&key={$API_KEY}"
    . "&language=fr"
    . "&reviews_sort=newest";

$detailsResponse = @file_get_contents($detailsUrl);

if ($detailsResponse === false) {
    echo json_encode([
        'success' => false, 
        'error' => 'API inaccessible'
    ]);
    exit;
}

$detailsData = json_decode($detailsResponse, true);

if ($detailsData['status'] !== 'OK') {
    echo json_encode([
        'success' => false, 
        'error' => 'Erreur API Google', 
        'status' => $detailsData['status'],
        'place_id_utilisé' => $PLACE_ID
    ]);
    exit;
}

$place = $detailsData['result'];

// Formater les avis
$reviews = [];
if (!empty($place['reviews'])) {
    foreach ($place['reviews'] as $review) {
        $reviews[] = [
            'author' => $review['author_name'],
            'rating' => $review['rating'],
            'text' => !empty($review['text']) ? $review['text'] : 'Excellent service ! ⭐',
            'time' => $review['relative_time_description'],
            'photo' => $review['profile_photo_url'] ?? null
        ];
    }
}

// Construire la réponse
$response = [
    'success' => true,
    'business' => [
        'name' => $place['name'],
        'rating' => $place['rating'] ?? 5,
        'total_reviews' => $place['user_ratings_total'] ?? 0,
        'google_url' => "https://www.google.com/maps?cid={$CID}",
        'address' => $place['formatted_address'] ?? ''
    ],
    'reviews' => $reviews,
    'place_id' => $PLACE_ID,
    'cid' => $CID,
    'cached_at' => date('Y-m-d H:i:s')
];

// Sauvegarder en cache
file_put_contents($CACHE_FILE, json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

// Retourner la réponse
echo json_encode($response, JSON_UNESCAPED_UNICODE);
