<?php

/**
 * Entity / Model
 * Dalam pemrograman berorientasi object, biasanya sebuah tabel di database akan selalu dibuat representasinya sebagai class Entity atau Model
 * Ini bisa mempermudah ketika membuat kode program
 * Misal ketika kita query ke Repository, dibanding mengembalikan array, alangkah baiknya Repository melakukan konversi terlebih dahulu ke class Entity / Model, sehingga kita tinggal menggunakan objectnya saja
 */

namespace Model {
    class Comment
    {
        public function __construct(
            private ?int $id = null,
            private ?string $email = null,
            private ?string $comment = null
        ) {
        }



        /**
         * Get the value of id
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
            $this->id = $id;

            return $this;
        }


        /**
         * Get the value of email
         *
         * @return ?string
         */
        public function getEmail(): ?string
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @param ?string $email
         *
         * @return self
         */
        public function setEmail(?string $email): self
        {
            $this->email = $email;

            return $this;
        }

        /**
         * Get the value of comment
         *
         * @return ?string
         */
        public function getComment(): ?string
        {
            return $this->comment;
        }

        /**
         * Set the value of comment
         *
         * @param ?string $comment
         *
         * @return self
         */
        public function setComment(?string $comment): self
        {
            $this->comment = $comment;

            return $this;
        }
    }
}
