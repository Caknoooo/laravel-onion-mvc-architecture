<?php

namespace App\Core\Application\Image;

use App\Exceptions\UserException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUpload
{
    private UploadedFile $uploaded_file;
    private array $available_type;
    private array $available_mime_type;
    private int $max_size;
    private string $path;
    private string $seed;
    private string $file_name;

    /**
     * @param UploadedFile $uploaded_file
     * @param array $available_type
     * @param array $available_mime_type
     * @param int $max_size
     * @param string $path
     * @param string $seed
     */
    public function __construct(
        UploadedFile $uploaded_file,
        string $path,
        string $seed,
        string $file_name,
    ) {
        $this->uploaded_file = $uploaded_file;

        $this->available_type = [
          'jpg',
          'jpeg',
          'png',
        ];

        $this->available_mime_type = [
          'image/jpeg',
          'image/png',
          'image/jpg',
        ];

        $this->max_size = 1024 * 1024 * 2;
        $this->path = $path;
        $this->seed = $seed;
        $this->file_name = trim($file_name);

        $this->check();
    }

    /**
     * @throws Exception
     */
    public static function create(
        UploadedFile $uploaded_file,
        string $path,
        string $seed,
        string $file_name,
    ): self {
        return new self($uploaded_file, $path, $seed, $file_name);
    }

    /**
     * @throws Exception
     */
    public function check(): void
    {
        if(!in_array($this->uploaded_file->getClientOriginalExtension(), $this->available_type)) {
            throw new UserException('file type not allowed', 400);
        }

        if(!in_array($this->uploaded_file->getMimeType(), $this->available_mime_type)) {
            throw new UserException('file mime type not allowed', 400);
        }

        if($this->uploaded_file->getSize() > $this->max_size) {
            throw new UserException('file size greather than 2Mb', 400);
        }
    }

    /**
     * @return string
     */
    public function upload(): string
    {
        $file_front = str_replace(" ", "_", strtolower($this->file_name));
        $encrypted_seed = base64_encode($this->seed);
        $uploaded = Storage::putFileAs(
            "public/" . $this->path,
            $this->uploaded_file,
            $file_front . "_" . $encrypted_seed . "." . $this->uploaded_file->getClientOriginalExtension()
        );

        if(!$uploaded) {
            throw new UserException('file upload failed', 500);
        }

        $full_path = "/storage/" . $this->path . "/" . $file_front . "_" . $encrypted_seed . "." . $this->uploaded_file->getClientOriginalExtension();

        return $full_path;
    }
}
