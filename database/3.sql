PGDMP     (    6                 {            avanteparkdb    14.5    14.5 7    <           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            =           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            >           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    19388    avanteparkdb    DATABASE     l   CREATE DATABASE avanteparkdb WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE avanteparkdb;
                postgres    false            �            1259    19392    cancelamentos_id_calcel_seq    SEQUENCE     �   CREATE SEQUENCE public.cancelamentos_id_calcel_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.cancelamentos_id_calcel_seq;
       public          postgres    false            �            1259    19393    cancelamentos_id_vehicle_seq    SEQUENCE     �   CREATE SEQUENCE public.cancelamentos_id_vehicle_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.cancelamentos_id_vehicle_seq;
       public          postgres    false            �            1259    19389    cancelamentos    TABLE       CREATE TABLE public.cancelamentos (
    id_calcel integer DEFAULT nextval('public.cancelamentos_id_calcel_seq'::regclass) NOT NULL,
    id_vehicle integer DEFAULT nextval('public.cancelamentos_id_vehicle_seq'::regclass) NOT NULL,
    motivo character varying(255)
);
 !   DROP TABLE public.cancelamentos;
       public         heap    postgres    false    210    211            �            1259    19394    checkin_idveiculo_seq1    SEQUENCE     �   CREATE SEQUENCE public.checkin_idveiculo_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.checkin_idveiculo_seq1;
       public          postgres    false            �            1259    19395    checkin    TABLE     �  CREATE TABLE public.checkin (
    idveiculo integer DEFAULT nextval('public.checkin_idveiculo_seq1'::regclass) NOT NULL,
    dataentrada date,
    horaentrada time without time zone,
    vaga character varying(255),
    manobrista character varying(255),
    datasaida date,
    horasaida time without time zone,
    totalpag character varying(255),
    metodopag character varying(255),
    stats character varying(255)
);
    DROP TABLE public.checkin;
       public         heap    postgres    false    212            �            1259    19734    clientes    TABLE       CREATE TABLE public.clientes (
    id_cliente integer NOT NULL,
    nome_cliente character varying(255),
    cpf_cliente character varying(255),
    nascimento_cliente date,
    telefone_cliente character varying(255),
    carro_cliente character varying(255)
);
    DROP TABLE public.clientes;
       public         heap    postgres    false            �            1259    19733    clientes_id_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public.clientes_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.clientes_id_cliente_seq;
       public          postgres    false    225            @           0    0    clientes_id_cliente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.clientes_id_cliente_seq OWNED BY public.clientes.id_cliente;
          public          postgres    false    224            �            1259    19402    endereco    TABLE     �   CREATE TABLE public.endereco (
    endid integer NOT NULL,
    rua character varying(255),
    numero integer,
    bairro character varying(255)
);
    DROP TABLE public.endereco;
       public         heap    postgres    false            �            1259    19407    funcionarios    TABLE     d   CREATE TABLE public.funcionarios (
    funcid integer NOT NULL,
    cargo character varying(255)
);
     DROP TABLE public.funcionarios;
       public         heap    postgres    false            �            1259    19410    pessoa_fisica_idpf_seq    SEQUENCE     �   CREATE SEQUENCE public.pessoa_fisica_idpf_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.pessoa_fisica_idpf_seq;
       public          postgres    false            �            1259    19411    pessoa_fisica    TABLE        CREATE TABLE public.pessoa_fisica (
    idpf integer DEFAULT nextval('public.pessoa_fisica_idpf_seq'::regclass) NOT NULL,
    nome character varying(255),
    nascimento date,
    cpf character varying(255),
    telefone character varying(255),
    endereco integer,
    ativo integer
);
 !   DROP TABLE public.pessoa_fisica;
       public         heap    postgres    false    216            �            1259    19417    usuarios_iduser_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_iduser_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.usuarios_iduser_seq;
       public          postgres    false            �            1259    19418    usuarios    TABLE     �   CREATE TABLE public.usuarios (
    iduser integer DEFAULT nextval('public.usuarios_iduser_seq'::regclass) NOT NULL,
    email character varying(255),
    senha character varying(255),
    userperm integer,
    funcid integer
);
    DROP TABLE public.usuarios;
       public         heap    postgres    false    218            �            1259    19424    vagas    TABLE     �   CREATE TABLE public.vagas (
    id_vaga integer NOT NULL,
    setor character varying(255),
    vaga integer,
    stats character varying(255)
);
    DROP TABLE public.vagas;
       public         heap    postgres    false            �            1259    19430    vagas_id_vaga_seq1    SEQUENCE     �   CREATE SEQUENCE public.vagas_id_vaga_seq1
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.vagas_id_vaga_seq1;
       public          postgres    false    220            A           0    0    vagas_id_vaga_seq1    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.vagas_id_vaga_seq1 OWNED BY public.vagas.id_vaga;
          public          postgres    false    221            �            1259    19659    veiculos_idveiculo_seq    SEQUENCE     �   CREATE SEQUENCE public.veiculos_idveiculo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.veiculos_idveiculo_seq;
       public          postgres    false            �            1259    19660    veiculos    TABLE       CREATE TABLE public.veiculos (
    idveiculo integer DEFAULT nextval('public.veiculos_idveiculo_seq'::regclass) NOT NULL,
    placa character varying(255),
    modelo character varying(255),
    cor character varying(255),
    tamanho character varying(255)
);
    DROP TABLE public.veiculos;
       public         heap    postgres    false    222            �           2604    19737    clientes id_cliente    DEFAULT     z   ALTER TABLE ONLY public.clientes ALTER COLUMN id_cliente SET DEFAULT nextval('public.clientes_id_cliente_seq'::regclass);
 B   ALTER TABLE public.clientes ALTER COLUMN id_cliente DROP DEFAULT;
       public          postgres    false    224    225    225            �           2604    19440    vagas id_vaga    DEFAULT     o   ALTER TABLE ONLY public.vagas ALTER COLUMN id_vaga SET DEFAULT nextval('public.vagas_id_vaga_seq1'::regclass);
 <   ALTER TABLE public.vagas ALTER COLUMN id_vaga DROP DEFAULT;
       public          postgres    false    221    220            )          0    19389    cancelamentos 
   TABLE DATA           F   COPY public.cancelamentos (id_calcel, id_vehicle, motivo) FROM stdin;
    public          postgres    false    209   �A       -          0    19395    checkin 
   TABLE DATA           �   COPY public.checkin (idveiculo, dataentrada, horaentrada, vaga, manobrista, datasaida, horasaida, totalpag, metodopag, stats) FROM stdin;
    public          postgres    false    213   �A       9          0    19734    clientes 
   TABLE DATA           ~   COPY public.clientes (id_cliente, nome_cliente, cpf_cliente, nascimento_cliente, telefone_cliente, carro_cliente) FROM stdin;
    public          postgres    false    225   �A       .          0    19402    endereco 
   TABLE DATA           >   COPY public.endereco (endid, rua, numero, bairro) FROM stdin;
    public          postgres    false    214   B       /          0    19407    funcionarios 
   TABLE DATA           5   COPY public.funcionarios (funcid, cargo) FROM stdin;
    public          postgres    false    215   �B       1          0    19411    pessoa_fisica 
   TABLE DATA           _   COPY public.pessoa_fisica (idpf, nome, nascimento, cpf, telefone, endereco, ativo) FROM stdin;
    public          postgres    false    217    C       3          0    19418    usuarios 
   TABLE DATA           J   COPY public.usuarios (iduser, email, senha, userperm, funcid) FROM stdin;
    public          postgres    false    219   �C       4          0    19424    vagas 
   TABLE DATA           <   COPY public.vagas (id_vaga, setor, vaga, stats) FROM stdin;
    public          postgres    false    220   -D       7          0    19660    veiculos 
   TABLE DATA           J   COPY public.veiculos (idveiculo, placa, modelo, cor, tamanho) FROM stdin;
    public          postgres    false    223   lD       B           0    0    cancelamentos_id_calcel_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.cancelamentos_id_calcel_seq', 1, true);
          public          postgres    false    210            C           0    0    cancelamentos_id_vehicle_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.cancelamentos_id_vehicle_seq', 1, true);
          public          postgres    false    211            D           0    0    checkin_idveiculo_seq1    SEQUENCE SET     D   SELECT pg_catalog.setval('public.checkin_idveiculo_seq1', 1, true);
          public          postgres    false    212            E           0    0    clientes_id_cliente_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.clientes_id_cliente_seq', 1, true);
          public          postgres    false    224            F           0    0    pessoa_fisica_idpf_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.pessoa_fisica_idpf_seq', 5, true);
          public          postgres    false    216            G           0    0    usuarios_iduser_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.usuarios_iduser_seq', 1, true);
          public          postgres    false    218            H           0    0    vagas_id_vaga_seq1    SEQUENCE SET     @   SELECT pg_catalog.setval('public.vagas_id_vaga_seq1', 5, true);
          public          postgres    false    221            I           0    0    veiculos_idveiculo_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.veiculos_idveiculo_seq', 2, true);
          public          postgres    false    222            �           2606    19442    checkin checkin_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.checkin
    ADD CONSTRAINT checkin_pkey PRIMARY KEY (idveiculo);
 >   ALTER TABLE ONLY public.checkin DROP CONSTRAINT checkin_pkey;
       public            postgres    false    213            �           2606    19444    endereco endereco_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.endereco
    ADD CONSTRAINT endereco_pkey PRIMARY KEY (endid);
 @   ALTER TABLE ONLY public.endereco DROP CONSTRAINT endereco_pkey;
       public            postgres    false    214            �           2606    19446    funcionarios funcionarios_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT funcionarios_pkey PRIMARY KEY (funcid);
 H   ALTER TABLE ONLY public.funcionarios DROP CONSTRAINT funcionarios_pkey;
       public            postgres    false    215            �           2606    19448     pessoa_fisica pessoa_fisica_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.pessoa_fisica
    ADD CONSTRAINT pessoa_fisica_pkey PRIMARY KEY (idpf);
 J   ALTER TABLE ONLY public.pessoa_fisica DROP CONSTRAINT pessoa_fisica_pkey;
       public            postgres    false    217            �           2606    19450    usuarios usuarios_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (iduser);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public            postgres    false    219            �           2606    19667    veiculos veiculos_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.veiculos
    ADD CONSTRAINT veiculos_pkey PRIMARY KEY (idveiculo);
 @   ALTER TABLE ONLY public.veiculos DROP CONSTRAINT veiculos_pkey;
       public            postgres    false    223            �           2606    19453 +   cancelamentos cancelamentos_id_vehicle_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.cancelamentos
    ADD CONSTRAINT cancelamentos_id_vehicle_fkey FOREIGN KEY (id_vehicle) REFERENCES public.checkin(idveiculo);
 U   ALTER TABLE ONLY public.cancelamentos DROP CONSTRAINT cancelamentos_id_vehicle_fkey;
       public          postgres    false    209    3212    213            �           2606    19458    pessoa_fisica fk_endereco    FK CONSTRAINT        ALTER TABLE ONLY public.pessoa_fisica
    ADD CONSTRAINT fk_endereco FOREIGN KEY (endereco) REFERENCES public.endereco(endid);
 C   ALTER TABLE ONLY public.pessoa_fisica DROP CONSTRAINT fk_endereco;
       public          postgres    false    214    3214    217            �           2606    19463    endereco fk_endereco    FK CONSTRAINT     {   ALTER TABLE ONLY public.endereco
    ADD CONSTRAINT fk_endereco FOREIGN KEY (endid) REFERENCES public.pessoa_fisica(idpf);
 >   ALTER TABLE ONLY public.endereco DROP CONSTRAINT fk_endereco;
       public          postgres    false    217    3218    214            �           2606    19468    funcionarios fk_funcid    FK CONSTRAINT     ~   ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT fk_funcid FOREIGN KEY (funcid) REFERENCES public.pessoa_fisica(idpf);
 @   ALTER TABLE ONLY public.funcionarios DROP CONSTRAINT fk_funcid;
       public          postgres    false    215    217    3218            �           2606    19473 )   pessoa_fisica pessoa_fisica_endereco_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.pessoa_fisica
    ADD CONSTRAINT pessoa_fisica_endereco_fkey FOREIGN KEY (endereco) REFERENCES public.endereco(endid);
 S   ALTER TABLE ONLY public.pessoa_fisica DROP CONSTRAINT pessoa_fisica_endereco_fkey;
       public          postgres    false    217    214    3214            �           2606    19478    usuarios usuarios_funcid_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_funcid_fkey FOREIGN KEY (funcid) REFERENCES public.funcionarios(funcid);
 G   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_funcid_fkey;
       public          postgres    false    3216    215    219            �           2606    19668     veiculos veiculos_idveiculo_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.veiculos
    ADD CONSTRAINT veiculos_idveiculo_fkey FOREIGN KEY (idveiculo) REFERENCES public.checkin(idveiculo);
 J   ALTER TABLE ONLY public.veiculos DROP CONSTRAINT veiculos_idveiculo_fkey;
       public          postgres    false    3212    223    213            )      x������ � �      -      x������ � �      9   N   x�3�t/���H-�MUH-J�,J�4553�05�002�4200�54�5��41T��4551�02�ttr�5426����� ���      .   �   x��A
�0F��?��	�Ʀ�:AP��+7#	I3�&^�+x�^��탏��WV'.a���g͕6�o��ckZX�2܅d�������yu���Cfh����^8NL-�����p�����˟����t;X�J������.      /   <   x�3���ϩJ�,J�2��M��O*�,.I�2B�p����)8��dVq����qqq �>%      1   �   x�E��j�0���S�2dٖ�c(�6�����Hcp���������_�p+�W]�|���&�	R�HIY 8��0K���y�?�Z�V�G;�<9����8��b/��u���v{+�����Q���0��hu�t!�h\�}i�����oL���D9�d~g�Y�k��.幬�~�^���Aɿ��o~c~��@=      3   E   x�3�L�Kt(I-.I�K���4426�4�4�2�LN�����3�4�2�,N�-M�A�3262ʙr��qqq #��      4   /   x�3�t�4�K��L�2�M�lc ��6��l# �ʎ���� ��      7      x������ � �     