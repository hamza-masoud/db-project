<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OwnerStatus extends Enum
{
	const Approved = "Approved";
	const Pending = "Pending";
	const Rejected = "Rejected";
	const Stopped = "Stopped";
}
