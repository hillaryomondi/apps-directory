<?php
function makeOrderNumber($id) {
    return "PO-".str_pad($id,3,"0", STR_PAD_LEFT);
}
function makeLpoNumber($id) {
    return "LPO-".str_pad($id,3, "0",STR_PAD_LEFT);
}
function jsonRes($success, $message, $payload=[], $code=200) {
    return response()->json(['success' => $success, "message" => $message, "payload" => $payload],$code);
}
