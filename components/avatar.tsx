import Image from 'next/image'

type Props = {
  name: string
  picture: string
}

const Avatar = ({ name, picture }: Props) => {
  return (
    <div className="flex items-center">
      <Image src={picture} alt={name} width={40} height={40} />
    <div className="flex-column items-center">

      <div className="font-bold">{name}</div>
      <div><a href="https://twitter.com/js_luke_overflo">@js_luke_overflo</a></div>
      <div><a href="mailto:luke@loganwebdev.com">luke@loganwebdev.com</a></div>

    </div>

    </div>
  )
}

export default Avatar
