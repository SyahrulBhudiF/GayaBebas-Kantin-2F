<?php
class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            if ($_SESSION['flash']['tipe'] == 'danger') {
                echo '
                <div id="flashMessage" class="fixed inset-0 items-start justify-center z-50 bg-black bg-opacity-20 flex">
                    <div class="flex flex-col gap-5 m-2">
                        <div class="max-w-lg rounded bg-red-100 text-red-700 overflow-hidden shadow-md shadow-red-500/20">
                            <div class="flex">
                                <div class="flex items-center gap-4 p-4">
                                    <div class="shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="font-bold">' . $_SESSION['flash']['pesan'] . '</p>
                                        <p class="text-sm">' . $_SESSION['flash']['aksi']  . '</p>
                                    </div>
                                </div>
                                <div class="flex cursor-pointer items-center border-l border-red-200 hover:bg-red-200 px-5" onclick="closeModalAlert()">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            } else if ($_SESSION['flash']['tipe'] == 'success') {
                echo '
                <div id="flashMessage" class="fixed inset-0 items-start justify-center z-50 bg-black bg-opacity-20 flex">
                    <div class="flex flex-col gap-5 m-2">
                        <div class="max-w-lg rounded bg-green-100 text-green-700 overflow-hidden shadow-md shadow-green-500/20">
                            <div class="flex">
                                <div class="flex items-center gap-4 p-4">
                                    <div class="shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                    </div>
                                    <div class="space-y-1">
                                        <p class="font-bold">' . $_SESSION['flash']['pesan'] . '</p>
                                        <p class="text-sm">' . $_SESSION['flash']['aksi']  . '</p>
                                    </div>
                                </div>
                                <div class="flex cursor-pointer items-center border-l border-green-200 hover:bg-green-200 px-5" onclick="closeModalAlert()">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            unset($_SESSION['flash']);
        }
    }
}
