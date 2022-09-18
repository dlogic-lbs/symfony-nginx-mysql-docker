<?php

/**
 * Class PerformanceChecker
 */
class PerformanceChecker
{
    private float $startTime;
    private float $endTime;
    private int $memoryUsage = 0;
    private int $memoryUsagePeak = 0;
    private bool $stopped = false;

    /**
     * PerformanceChecker constructor.
     */
    public function __construct()
    {
        $this->startTime = microtime(true);
    }

    /**
     * Display the performance checked.
     */
    public function display(): void
    {
        if (false === $this->stopped) {
            $this->stop();
        }

        $timeTaken = number_format(($this->endTime - $this->startTime) * 1000, 5, '.', ',');
        $memoryUsed = number_format($this->memoryUsage / 1024, 2, '.', ',');
        $memoryUsedPeak = number_format($this->memoryUsagePeak / 1024, 2, '.', ',');
        $memoryUsedMbs = number_format($this->memoryUsage / (1024*1024), 2, '.', ',');
        $memoryUsedPeakMbs = number_format($this->memoryUsagePeak / (1024*1024), 2, '.', ',');
        $includedFiles = count(get_included_files());

        echo <<<EOT
        <style type="text/css">
            .performance-checker {
                position: fixed;
                bottom: 20px;
                width: 96vw;                
                background-color: #669;
                padding: 10px;                
            }
            .performance-checker p {
                font-size: 12px;
                line-height: 12px;
                color: white;
                margin: 4px;
            }
            .performance-checker p span {
                color: yellow;
                font-size: 12px;
                left: 100px;
            }
        </style>
        <div class="performance-checker">            
            <p>Time taken: <span>$timeTaken ms</span></p>
            <p>Memory usage: <span>$memoryUsed kbs</span> or <span>$memoryUsedMbs Mbs</span></p>
            <p>Memory usage peak: <span>$memoryUsedPeak kb</span> or <span>$memoryUsedPeakMbs Mbs</span></p>
            <p>Files used (loaded): <span>$includedFiles</span></p>
        </div>
        EOT;

    }

    /**
     * @return $this
     */
    private function stop(): self
    {
        $this->endTime = microtime(true);
        $this->memoryUsage = memory_get_usage(false);
        $this->memoryUsagePeak = memory_get_peak_usage(false);
        $this->stopped = true;

        return $this;
    }
}
