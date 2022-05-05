<?php
declare(strict_types=1);

namespace App\Application\Sample;

/**
 * キャリアの詳細情報を取得する時に利用するコマンドクラス
 *
 * Class CareerGetCommand
 * @package People\PersonalProfile\Application\Career
 */
final class CareerGetCommand
{
    /**
     * @var string
     */
    private $employeeId;

    /**
     * @param string $employeeId
     */
    public function __construct(string $employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return string
     */
    public function getEmployeeId(): string
    {
        return $this->employeeId;
    }
}
