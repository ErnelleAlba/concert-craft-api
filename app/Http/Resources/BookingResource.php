<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "userId" => $this->user_id,
            "userInfo"=> UserResource::make($this->whenLoaded('user')),
            "concertId" => $this->concert_id,
            "concertInfo"=> ConcertResource::make($this->whenLoaded('concert')),
            "seatPosition" => $this->seat_position,
            "noOfTickets" => $this->no_of_tickets,
            "totalPrice" => $this->total_price,
        ];
    }
}
